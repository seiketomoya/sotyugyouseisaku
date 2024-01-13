@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header') <!-- ヘッダー -->
    <div class="d-flex justify-content-between align-items-center">
        <h1>商品一覧</h1>
    </div>
@stop

@section('content')
    <!-- 商品のカード表示 -->
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-4 mb-3">
            <div class="card h-100" style="width: 100%;">
                    @if($item->image) <!-- カードトップに画像を挿入予定 -->
                    <img src="{{ Storage::url($item->image) }}" class="card-img-top mx-auto d-block h-50" alt="{{ $item->name }}" style="width: 100%; height: 100%;">
                        @else
                        <!-- 商品画像がない場合 -->
                     <img src="{{ asset('images/noimage.jpg') }}" class="card-img-top mx-auto d-block h-50" alt="No Image" style="width: 100%; height: 100%;">
                         
                    @endif 
                    <div class="card-body">
                    <h5 class="card-title" style="margin-bottom: 10px;">{{ $item->name }}</h5>
                        <p class="card-text">種別: {{ $item->type }}</p>
                        <p class="card-text">値段: ¥{{ $item->price }}</p>
                        <p class="card-text">在庫数: {{ $item->stock }}個</p>
                        <p class="card-text">詳細: {{ $item->detail }}</p>
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