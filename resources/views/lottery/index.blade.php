@extends('layouts.app')

@section('title', 'つくってみよう')
@section('content')
<div class="container">
    <div class="text-center">
        <p>みんなでくじ引きが作れるサービスです</p>
        <img src="https://placehold.jp/250x250.png" class="rounded mx-auto d-block" alt="説明っぽい画像">
    </div>
    <div class="mt-5 text-center">
        <p class="mb-1">登録/ログイン不要</p>
        <a href="{{ secure_url('/k/create') }}" class="btn btn-primary">つくってみる</a>
    </div>
</div>
@endsection
