<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.Login');
})->name('login');

Route::get('/registerPage', function () {
    return view('pages.Register');
});

Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::post("/logout", [UserController::class, 'logout'])->name('user.logout');

Route::post("/login", [UserController::class, 'login'])->name('user.login');

// Route::get('/home', function () {
//     return view('pages.Home');
// })->middleware('auth');

Route::middleware('auth')->group(function () {
    //home route
    Route::get('/home', [UserController::class, 'home'])->name('home');
    //add contact route
    Route::get('/addContact', [ContactController::class, 'addContact'])->name('addContact');
    //insert contact to db route
    Route::post('/createContact', [ContactController::class, 'createContact'])->name('createContact');
    //edit contact page route
    Route::get("/contact/{id}/edit", [ContactController::class, 'editPage'])->name('editPage');
    //edit contact in db route
    Route::put("/contact/{id}/update", [ContactController::class, 'editContact'])->name('editContact');
    //delete contact in db route (updating is_active)
    Route::put('/contact/{id}/deleteContact', [ContactController::class, 'deleteContact'])->name('deleteContact');
    //search route
    Route::get('/search', [ContactController::class, 'search']);
});
