<?php
function validationMessages()
{
    $messages = [
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser un texto.',
        'name.max' => 'El nombre no puede tener más de :max caracteres.',

        'lastname.required' => 'El apellido es obligatorio.',
        'lastname.string' => 'El apellido debe ser un texto.',
        'lastname.max' => 'El apellido no puede tener más de :max caracteres.',

        'rut.required' => 'El RUT es obligatorio.',
        'rut.string' => 'El RUT debe ser un texto.',
        'rut.unique' => 'El RUT ya ha sido registrado.',

        'email.required' => 'El correo electrónico es obligatorio.',
        'email.string' => 'El correo electrónico debe ser un texto.',
        'email.unique' => 'El correo electrónico ya ha sido registrado.',
        'email.regex' => 'El formato del correo electrónico no es válido.',

        'points.required' => 'Los puntos son obligatorios.',
        'points.integer' => 'Los puntos deben ser un número entero.',
        'points.min' => 'Los puntos no pueden ser menores a :min.',
    ];

    return $messages;
}

