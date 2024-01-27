<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all()->makeHidden(['id','role']);

            if ($users->isEmpty()) {
                return response()->json(['message' => 'No hay usuarios disponibles.'], 200);
            }
            return response()->json([
                'users' => $users,
                'success'=> 'Se han obtenido todos los usuarios.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener los usuarios.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $messages = validationMessages();

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'rut' => 'required|string|unique:users',
                'email' => 'required|string|unique:users|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
                'points' => 'required|integer|min:0',
            ], $messages);

            $user = User::create([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'rut' => $request->input('rut'),
                'email' => $request->input('email'),
                'points' => $request->input('points'),
            ]);

            $user->makeHidden(['id']);

            return response()->json([
                'success' => 'Se ha creado un usuario.',
                'user' => $user], 201);

            } catch (\Illuminate\Validation\ValidationException $e) {
                $errors = $e->errors();
                return response()->json(['errors' => $errors], 422);

            } catch (\Exception $e) {
                return response()->json(['error' => 'Error al crear usuario.' . $e->getMessage()], 500);
            }
    }
}
