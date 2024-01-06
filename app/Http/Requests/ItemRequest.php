<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
             // バリデーションルール
            'name' => 'required|max:100', // 商品名の最大文字数を100文字に設定
            'type' => 'required',
            'price' => 'required|numeric|min:0|max:30000', // 価格が0円以上、30000円以下であることを保証
            'stock' => 'required',
            'detail' => 'required|max:500', // 詳細の最大文字数を500文字に設定
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション


        ];
    }
}
