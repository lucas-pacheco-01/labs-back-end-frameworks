<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|----------------------------------------------------------
| 3 usuários com senhas diferentes
|----------------------------------------------------------
*/

$users = [
    'admin'  => Hash::make('admin123'),
    'joao'   => Hash::make('joao456'),
    'maria'  => Hash::make('maria789'),
];

/*
|----------------------------------------------------------
| Calculadora (soma + multiplicação)
|----------------------------------------------------------
*/
Route::get('/soma', function () {
    $a = request('a');
    $b = request('b');
    $operacao = request('operacao');

    if (is_numeric($a) && is_numeric($b)) {
        $resultado = match ($operacao) {
            'multiplicar' => $a * $b,
            default       => $a + $b,
        };
    } else {
        $resultado = null;
    }

    return view('soma', ['resultado' => $resultado]);
});

/*
|----------------------------------------------------------
| Mostrar formulário de login
|----------------------------------------------------------
*/
Route::get('/login', function () {
    if (session()->has('user')) {
        return redirect('/dashboard');
    }
    return view('login');
});

/*
|----------------------------------------------------------
| Processar login
|----------------------------------------------------------
*/
Route::post('/login', function () use ($users) {
    $user = request('user');
    $pass = request('password');

    if (isset($users[$user]) && Hash::check($pass, $users[$user])) {
        session(['user' => $user]);
        return redirect('/dashboard');
    }

    return back()->with('error', 'Credenciais inválidas.');
});

/*
|----------------------------------------------------------
| Dashboard protegido — com aviso de "login necessário"
|----------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (! session()->has('user')) {
        return redirect('/login')->with('aviso', 'Login necessário para acessar o dashboard.');
    }
    return view('dashboard', ['user' => session('user')]);
});

/*
|----------------------------------------------------------
| Logout
|----------------------------------------------------------
*/
Route::post('/logout', function () {
    session()->forget('user');
    return redirect('/login');
});
