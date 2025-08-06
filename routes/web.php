

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
});

Route::get('data-hinterland', function () {
    return view('data-hinterland/hinterland');
});

Route::get('traffic-marine', function () {
    return view('informasi/traffic-marine');
});


Route::post('upload-image', [PostController::class, 'uploadImage'])->name('upload-image');
Route::resource('posts', PostController::class);

Route::get('/hinterland', function () {
    return view('data-hinterland.hinterland');
})->name('hinterland');

Route::get('/hinterland/{id}', [App\Http\Controllers\HinterlandController::class, 'show'])->name('detail-hinterland');

Auth::routes();
Route::post('hinterland-tabs', [App\Http\Controllers\HinterlandTabController::class, 'store'])->name('hinterland-tabs.store');
Route::get('hinterland-tabs/{id}/edit', [App\Http\Controllers\HinterlandTabController::class, 'edit'])->name('hinterland-tabs.edit');
Route::put('hinterland-tabs/{id}', [App\Http\Controllers\HinterlandTabController::class, 'update'])->name('hinterland-tabs.update');
Route::delete('hinterland-tabs/{id}', [App\Http\Controllers\HinterlandTabController::class, 'destroy'])->name('hinterland-tabs.destroy');
Route::get('hinterland-tabs', function () {
    return view('data-hinterland.hinterland-tabs');
})->name('hinterland-tabs');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('hinterland-tab', App\Http\Controllers\HinterlandTabController::class)->only(['edit', 'update', 'store', 'destroy']);
