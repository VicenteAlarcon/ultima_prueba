<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PdfController;
use Laravel\Socialite\Facades\Socialite;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Rutas Autenticación Socialite, Google
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    dd($user);
});

// Rutas principal, sistema de login y registro.

Route::get('/', function () {
    return view('authenticate.login');
})->name('first');

Route::get('/register_form', function() {
    return view('authenticate.register');
})->name('register.form');

Route::post('/login', [AuthController::class, 'login'])->name('users.login');
Route::post('/register', [AuthController::class, 'register'])->name('users.register');
Route::post('logout', [AuthController::class, 'logout'])->name('users.logout');



//Página home protegida por middleware de autenticación
Route::middleware(['auth'])->group(function() {


Route::get('/home', function() {
    return view('home.welcome');
})->name('welcome');

Route::get('/idioma/{id}', [UserController::class, 'getLanguage'])->name('idioma');
Route::resource('users', UserController::class);
Route::resource('types', TypeController::class);
Route::resource('terms', TermController::class);
Route::resource('descriptions', DescriptionController::class);
Route::resource('ideas', IdeaController::class);

/**
 *  Rutas creadas para modificar el método index de TypeController y TermController y así poder recoger las variables de 
 * la vista
 * */

 Route::get('type/{type}', [TypeController::class, 'index'])->name('type.index');
  Route::get('term/{term}', [TermController::class, 'index'])->name('term.index');

  // Ruta creada para la valoración de descripciones 

  Route::get('description/rating', [DescriptionController::class, 'showRatingForm'])->name('rating.form');
  Route::post('descritpion/insert', [DescriptionController::class, 'attachDescription'])->name('rating.attach');

// Ruta para cambiar el idioma
  Route::get('locale/{locale}', function ($locale)   {
    session()->put('locale', $locale);
    return Redirect::back();
  });
 
// Ruta para llamar al controlador de pdf

Route::get('imprimir-pdf', [PdfController::class, 'printPdf'])->name('print-pdf');
});