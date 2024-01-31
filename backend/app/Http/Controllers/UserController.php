<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::all()->makeHidden(['role']);

            if ($users->isEmpty()) {
                return response()->json(['message' => 'No hay usuarios disponibles.'], 200);
            }
            return response()->json(['users' => $users], 200);
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

    public function edit($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado.'], 404);
            }

            $user->makeHidden(['id','role','rut']);

            return response()->json([
                'user' => $user,
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar el usuario para editar.' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $messages = validationMessages();

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|unique:users|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
                'points' => 'required|integer|min:0',
            ], $messages);

            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado.'], 404);
            }

            $user->update([
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'points' => $request->input('points'),
            ]);

            $user->makeHidden(['id','role','rut']);

            return response()->json([
                'success' => 'Usuario actualizado correctamente.',
                'user' => $user
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->errors();
            return response()->json(['errors' => $errors], 422);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el usuario.' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado.'], 404);
            }

            $user->delete();

            return response()->json(['success' => 'Usuario eliminado correctamente.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el usuario.' . $e->getMessage()], 500);
        }
    }

    public function searchRut($rut)
    {
        try {
            $user = User::where('rut', $rut)->first();

            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado.'], 404);
            }

            $user->makeHidden(['id', 'role']);

            return response()->json([
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar el usuario por RUT.' . $e->getMessage()], 500);
        }
    }

    public function searchEmail($email)
    {
        try {
            $user = User::where('email', $email)->first();

            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado.'], 404);
            }


            $user->makeHidden(['id', 'role']);

            return response()->json([
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al buscar el usuario por correo electrónico.' . $e->getMessage()], 500);
        }
    }
}
