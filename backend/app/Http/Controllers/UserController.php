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
}
