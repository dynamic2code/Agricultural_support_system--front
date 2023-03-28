<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[MainController::class, 'index'])->name('index');
Route::get('/Home',[MainController::class, 'main'])->name('main');
Route::post('sign_up', [MainController::class, 'sign_up'])->name('sign_up');
Route::post('/run-python-script', function (Request $request) {
    $data = $request->input('data');
    $output = Artisan::call('run:python-script', ['data' => $data]);
    return response()->json(['message' => 'Python script executed.', 'output' => $output]);
});

