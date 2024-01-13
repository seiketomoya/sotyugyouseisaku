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
Route::get('/item/show', [ItemController::class, 'showItem'])->name('item.show');
 // 'item/create' URLにアクセスするとItemControllerのcreateメソッドが呼ばれ、商品登録フォームが表示される
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
 // 'item/create' URLへのPOSTリクエストを処理し、ItemControllerのregisterメソッドで商品を登録する
Route::post('/item/register', [ItemController::class, 'register'])->name('item.register');
 // 商品編集画面へのルート
Route::get('/item/edit{item}/', [ItemController::class, 'edit'])->name('item.edit');
 // 商品更新処理のルート
Route::patch('/item/edit{item}/', [ItemController::class, 'update'])->name('item.update');
 // 商品削除処理のルート
Route::get('/item/delete/{item}', [ItemController::class, 'delete'])->name('item.delete');





Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});

// Language Switcher Route 言語切替用ルートだよ
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});
