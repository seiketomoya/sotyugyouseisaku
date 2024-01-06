<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'items'; // テーブル名を指定

    public function getType()
    {
        switch ($this->type) {
            case 1:
                return 'ワイン';
            case 2:
                return 'ビール';
            case 3:
                return '日本酒';
            case 4:
                return '焼酎';
            case 5:
                return 'その他';
        }
    }
}
