<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all(); //モデルを使用してデータベースから全アイテムを取得

        return view('item.index', ['items' => $items]); //取得したアイテムをビューに渡す
    }

        public function showItem()
    {
        $items = Item::all(); // IDに対応する商品を取得

        return view('item.show', ['items' => $items]); // item.showを表示し、商品データを渡す
    }




    // registerメソッド: 商品登録処理を行います。
    public function register(Request $request)
    {
        // バリデーションルール
        $request->validate([
            'name' => 'required|max:100|regex:/^[^\d０-９]+$/u', // 商品名の最大文字数を100文字に設定
            'type' => 'required',
            'price' => 'required|numeric|min:0|max:30000', // 価格が0円以上、30000円以下であることを保証
            'stock' => 'required|numeric',
            'detail' => 'required|max:500', // 詳細の最大文字数を500文字に設定
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
        ]);
        // モデルを使用して商品を新規登録し、データベースに保存
        $item = new Item();
        $item->user_id = Auth::id();
        $item->name = $request->input('name');
        $item->type = $request->input('type');
        $item->price = $request->input('price');
        $item->stock = $request->input('stock');
        $item->detail = $request->input('detail');
        $item->image = $request->input('image');
        
    
        // 画像の処理を追加する場合
        if ($request->hasFile('image')) {
            // 画像を取得してBase64でエンコードする
            $imagePath = $request->file('image');
            $imageBase64 = base64_encode(file_get_contents($imagePath));
            $item->image = $imageBase64;
        }
    
        $item->save();

        return redirect('/item');

    }

        // 登録処理を実行
         public function create(Request $request)
    {
       
        // 一覧画面へ遷移する
        return view('item.create');
    }
        // editメソッド: 商品編集フォームを表示します。

    public function edit($itemId)
    {
        $item = Item::findOrFail($itemId); //指定された商品を検索

    return view('item.edit', compact('item')); //商品編集フォームの表示

    }

    // updateメソッド: 商品の更新処理を行います。
    public function update(ItemRequest $request, Item $item)
    {
       // バリデーションルール
       $request->validate([
        'name' => 'required|max:100|regex:/^[^\d０-９]+$/u', // 商品名の最大文字数を100文字に設定
        'type' => 'required',
        'price' => 'required|numeric|min:0|max:30000', // 価格が0円以上、30000円以下であることを保証
        'stock' => 'required |numeric',
        'detail' => 'required|max:500', // 詳細の最大文字数を500文字に設定
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
    ]);

    $data = [
        'name' => $request->name,
        'type' => $request->type,
        'price' => $request->price,
        'stock' => $request->stock,
        'detail' => $request->detail,
    ];
    
    // 選択された画像
    $image_path = "";
    // 現在の画像へのパスをセット
    $current_path = $item->image;

    if ($request->hasFile('image')) {
        if($current_path !==''&& !is_null($current_path)){
            Storage::disk('public')->delete($current_path);
        }
        $image_path = $request->file('image')->store('items','public');

        $data["image"] = $image_path;
    }
    // データベースを更新
    $item->update($data);

    // フラッシュメッセージに商品IDを含めてセッションに追加
    session()->flash('success', 'ID ' . $item->id . ' の更新は正常に完了しました。');

    return redirect('/item'); // 一覧画面へ遷移する
    }

    // deleteメソッド: 商品の削除処理を行います。
    public function delete(Item $item)
    {
        // IDでアイテムを検索して削除します
        $item->delete();

        // 削除後に特定のルートやページにリダイレクトします
        return redirect('/item');
    }

    



   
}

