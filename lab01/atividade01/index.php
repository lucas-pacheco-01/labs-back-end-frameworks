<?php
Route::get('/', fn() => view('playground', ['title' => 'Laravel Playground']));

Route::get('/hello/{nome}', fn(string $nome) => "Olá, {$nome}!");

Route::get(
    '/bem-vindo/{nome?}',
    fn(string $nome = 'Visitante') =>
    view('saudacao', ['nome' => $nome])
);

Route::get('/soma', function () {
    $a = request('a');
    $b = request('b');
    return view('soma', [
        'resultado' => is_numeric($a) && is_numeric($b) ? $a + $b : null,
    ]);
});
