<?php

use App\Http\Controllers\ProfileController;
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

//redirect to the main page
Route::get('/', function () {
    // return view('crud_screen');
    // return view('dashboard');
});

//insert data in database
Route::post('insertData', [ProfileController::class, 'Store_product_details']);

//get data from DB and view on the page
// Route::get('/', [ProfileController::class, 'get_product_details'])->name('dashboard');
Route::get('/dashboard', [ProfileController::class, 'get_product_details'])->name('dashboard');


//Update data in DB
Route::post('updateData', [ProfileController::class, 'update_product_details']);








// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->na('profilmee.destroy');
});

require __DIR__.'/auth.php';
