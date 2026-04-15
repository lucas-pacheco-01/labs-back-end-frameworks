<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|----------------------------------------------------------
| Tabelinha de "usuários" hard-coded
|----------------------------------------------------------
*/

$users = [
    // senha = secret
    'admin' => Hash::make('secret'),
];

/*
|----------------------------------------------------------
| Mostrar formulário
|----------------------------------------------------------
*/
Route::get('/login', function () {
    // se já estiver logado, vá direto ao dashboard
    if (session()->has('user')) {
        return redirect('/dashboard');
    }
    return view('login');
});

/*
|----------------------------------------------------------
| Processar envio do formulário
|----------------------------------------------------------
*/
Route::post('/login', function () use ($users) {
    $user = request('user');
    $pass = request('password');

    if (isset($users[$user]) && Hash::check($pass, $users[$user])) {
        // grava na sessão
        session(['user' => $user]);
        return redirect('/dashboard');
    }

    return back()->with('error', 'Credenciais inválidas.');
});

/*
|----------------------------------------------------------
| Dashboard protegido
|----------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (! session()->has('user')) {
        return redirect('/login');
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
