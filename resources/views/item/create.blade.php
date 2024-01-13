@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST" action="{{ route('item.register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="メロン">
                        </div> 
                         <!-- 種別はプルダウン方式 -->
                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type">
                                <option >【並(白等級)】中玉(1.3kg前後)1玉</option>
                                <option >【並(白等級)】大玉(1.4kg前後)1玉</option>
                                <option >【並(白等級)】特大玉(1.5kg前後)1玉</option>
                                <option >【並(白等級)】中玉(1.3kg前後)2玉</option>
                                <option >【並(白等級)】大玉(1.4kg前後)2玉</option>
                                <option >【並(白等級)】特大玉(1.5kg前後)２玉</option>
                                <option >【B級品(訳あり)】中玉(1.3kg前後)1玉</option>
                                <option >【B級品(訳あり)】中玉(1.3kg前後)２玉</option>
                                <option >【B級品(訳あり)】中玉(1.3kg前後)3玉</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type">値段</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="値段">
                        </div>

                        <div class="form-group">
                            <label for="type">在庫数</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <select class="form-control" id="detail" name="detail">
                                <option>「並」はメロンの分類では「白」と呼ばれ、標準ランクですが、一度ご賞味頂ければその味と香りにはきっと満足して頂きます。
                                </option>
                                <option>【B級】網が綺麗にはられていなかったり、トンボが折れてしまったなどの選別で弾かれたものです。味は問題ありません。
                                </option>
                        </div>

                        <div class="form-group">
                            <label for="image">商品画像</label>
                            <input type="file" class="form-control-file" id="image" name="image" >
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
            

                    
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')

@stop
