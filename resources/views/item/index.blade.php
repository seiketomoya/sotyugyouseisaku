@extends('adminlte::page')

@section('title', '商品管理')

@section('content_header') <!-- ヘッダー -->
    <div class="d-flex justify-content-between align-items-center">
        <h1>商品管理</h1>
        <a href="{{ route('item.create') }}" class="btn btn-primary">商品登録</a>
    </div>
@stop

@section('content')
    <!-- 商品のカード表示 -->
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-4 mb-3">
            <div class="card h-100" style="width: 100%;">
                    @if($item->image) <!-- カードトップに画像を挿入予定 -->
                    <img src="data:image/png;base64,{{ $item->image }}" class="card-img-top mx-auto d-block h-50" alt="{{ $item->name }}" style="width: 100%; height: 100%;">
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
                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary" style= "width: 100px">編集</a>
                        <a href="{{ route('item.delete', $item->id) }}" class="btn btn-danger float-right" style="width: 100px" onclick="confirmDelete(event, {{ $item->id }})">削除</a>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
               

@section('css')
@stop

@section('js')
<script>
    function confirmDelete(event, itemId) {
    // 確認のダイアログを表示
    var isConfirmed = confirm('本当に削除しますか？');

    // デフォルトのイベントをキャンセル
    event.preventDefault();

    if (isConfirmed) {
        window.location.href = '/item/delete/' + itemId;
    }
}

</script>


@stop
