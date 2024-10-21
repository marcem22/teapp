<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ActivityController;


Route::get('/contador', [ContadorController::class,'index'])->name('contador');

Route::get('/contador/{número}/inc', [ContadorController::class, 'incrementar'])->name('contador.inc');

Route::get('/contador/{número}/dec', [ContadorController::class, 'decrementar'])->name('contador.dec');

Route::get('/contador/reset', [ContadorController::class, 'reset'])->name('contador.reset');

Route::get('/contador/{número}/double', [ContadorController::class, 'duplicar'])->name('contador.double');

Route::get('/contador/set/{valor}', [ContadorController::class, 'establecer'])->name('contador.set');
// Redirige a la landing page al acceder a la raíz

Route::get('/', function () {
    return redirect()->route('landing');
});

// Ruta para la landing page
Route::get('/landing', [LandingPageController::class, 'index'])->name('landing');

// Ruta para iniciar sesión
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    // Aquí intenta autenticar al usuario
    if (auth()->attempt($request->only('email', 'password'))) {
        return redirect()->route('dashboard'); // Redirige al dashboard si la autenticación es exitosa
    }

    return redirect()->route('login')->withErrors('Credenciales incorrectas'); // Manejo de errores
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
Route::resource('patients', PatientController::class)->middleware('auth');


Route::resource('activities', ActivityController::class);
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
