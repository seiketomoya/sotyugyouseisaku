<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メロン販売サイト</title>
    <link href="{{asset('/css/home.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- swiper -->
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

</head>
<body>
<div class="container">

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3 class="text-center">浜名湖畔で育ったアールスメロン</h2>
@stop

@section('content')
     <!-- メイン画面・画像 -->
     <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ asset('images/icon/hamanako.jpg') }}"></div>
            <div class="swiper-slide"><img src="{{ asset('images/icon/melon1.jpeg') }}"></div>
            <div class="swiper-slide"><img src="{{ asset('images/icon/melon2.jpeg') }}"></div>
        </div>
        <!-- <div class="swiper-pagination"></div> -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
@stop

@section('css')
    {{--     <!-- Bootstrap CSS -->
    <link href="/css/home.css" rel="stylesheet"> --}}
@stop
</div>
</body>
@section('js')
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="{{ asset('/js/home.js') }}"></script>
@stop
