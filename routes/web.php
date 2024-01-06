<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/item', [App\Http\Controllers\ItemController::class, 'index']);
 // 'item/create' URLにアクセスするとItemControllerのcreateメソッドが呼ばれ、商品登録フォームが表示される
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
 // 'item/create' URLへのPOSTリクエストを処理し、ItemControllerのregisterメソッドで商品を登録する
Route::post('/item/register', [ItemController::class, 'register'])->name('item.register');
 // 商品編集画面へのルート
Route::get('/item/{item}/edit', [ItemController::class, 'edit'])->name('item.edit');
 // 商品更新処理のルート
Route::patch('/item/{item}/edit', [ItemController::class, 'update'])->name('item.update');
 // 商品削除処理のルート
Route::get('/item/{item}/delete', [ItemController::class, 'delete'])->name('item.delete');





Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
