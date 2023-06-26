<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TableController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('frontendWelcome.index');
Route::get('/thank-you', [WelcomeController::class, 'thankYou'])->name('frontendWelcome.thankYou');

Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('frontendCategories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('frontendCategories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('frontendMenus.index');
Route::get('/reservations/step-one', [FrontendReservationController::class, 'stepOne'])->name('frontendReservations.stepOne');
Route::post('/reservations/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('frontendReservations.store.stepOne');
Route::get('/reservations/step-two', [FrontendReservationController::class, 'stepTwo'])->name('frontendReservations.stepTwo');
Route::post('/reservations/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('frontendReservations.store.stepTwo');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['admin', 'auth'], 'prefix' => 'admin'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('categories', CategoryController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('tables', TableController::class);
    Route::resource('reservations', ReservationController::class);
});

require __DIR__.'/auth.php';
