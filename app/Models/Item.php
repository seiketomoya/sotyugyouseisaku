<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // fillableプロパティ: マスアサインメント（一括割り当て）で安全に割り当て可能な属性を定義します。
    // これにより、create()やupdate()メソッドなどで一括でデータを割り当てる際に、
    // これらの属性のみが割り当てられることが保証されます。.
    protected $fillable = ['name', 'type', 'price', 'stock', 'detail', 'user_id','image','order'];
}

