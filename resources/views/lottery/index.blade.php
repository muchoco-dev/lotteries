@extends('layouts.app')

@section('title', 'つくってみよう')
@section('content')
<div class="container">
    <div>
        <p>説明的ななにか</p>
        <img src="https://placehold.jp/150x150.png" class="rounded mx-auto d-block" alt="説明っぽい画像">
    </div>
    <div>
        <p></p>
        <a href="{{ secure_url('/k/create') }}" class="btn btn-primary">つくってみる</a>
    </div>
</div>
@endsection
