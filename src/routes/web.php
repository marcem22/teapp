<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LandingPageController;


Route::get('/contador', [ContadorController::class,'index'])->name('contador');

Route::get('/contador/{número}/inc', [ContadorController::class, 'incrementar'])->name('contador.inc');

Route::get('/contador/{número}/dec', [ContadorController::class, 'decrementar'])->name('contador.dec');

Route::get('/contador/reset', [ContadorController::class, 'reset'])->name('contador.reset');

Route::get('/contador/{número}/double', [ContadorController::class, 'duplicar'])->name('contador.double');

Route::get('/contador/set/{valor}', [ContadorController::class, 'establecer'])->name('contador.set');
// Redirige a la landing page al acceder a la raíz
// Ruta para la landing page
Route::get('/landing', [LandingPageController::class, 'index'])->name('landing');

// Ruta para iniciar sesión
Route::get('/login', function () {
    return view('login');
})->name('login');

// Procesar el inicio de sesión
Route::post('/login', function (Request $request) {
    // Aquí deberías validar el usuario y contraseña usando tu lógica de autenticación
    if (auth()->attempt($request->only('username', 'password'))) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login')->withErrors('Credenciales incorrectas');
});

// Rutas protegidas por middleware
Route::middleware('permission:see-panel')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
