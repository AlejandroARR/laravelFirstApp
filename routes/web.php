<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\gameController;
use App\Http\Controllers\SettingController;


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
/*
1 view Route::get ('game', [gameController::class, 'index']) ->name('game.index');
2 do Route::post ('game', [gameController::class, 'store']) ->name('game.store');
3 view Route::get ('game/create', [gameController::class, 'create']) ->name('game.create');
4 view Route::get ('game', [gameController::class, 'index']) ->name('game.show');
5 do Route::put ('game', [gameController::class, 'index']) ->name('game.update');
6 do Route::delete ('game', [gameController::class, 'index']) ->name('game.delete');
7 view Route::get ('game/{game}edit', [gameController::class, 'index']) ->name('game.edit');

*/

Route::get('/', function () {
    return view('index');
});


Route::resource('game', gameController::class);

Route::get('setting',[SettingController::class,'index'])->name('setting.index');
Route::put('setting',[SettingController::class,'update'])->name('setting.update');

Route::get('setting/showSelect',[SettingController::class,'showSelect'])->name('setting.showSelect');
