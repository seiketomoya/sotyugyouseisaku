@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header') <!-- ヘッダー -->
    <div class="d-flex justify-content-between align-items-center">
        <h1>商品一覧</h1>
        <a href="{{ route('item.create') }}" class="btn btn-primary">商品登録</a>
    </div>
@stop

@section('content')
    <!-- 商品のカード表示 -->
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($item->image) <!-- カードトップに画像を挿入予定 -->
                        <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                        @else
                        <!-- 商品画像がない場合 -->
                        <img src="{{ asset('images/noimage.jpg') }}" class="card-img-top" alt="No Image" style="max-width: 84%; max-height: 84%;">
                         
                    @endif 
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">種別: {{ $item->type }}</p>
                        <p class="card-text">値段: ¥{{ $item->price }}</p>
                        <p class="card-text">在庫数: {{ $item->stock }}個</p>
                        <p class="card-text">詳細: {{ $item->detail }}</p>
                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary" style= "width: 100px">編集</a>
                        <a href="{{ route('item.delete', $item->id) }}" class="btn btn-danger float-right" style= "width: 100px">削除</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
               

@section('css')
@stop

@section('js')
@stop
