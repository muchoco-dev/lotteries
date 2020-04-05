@extends('layouts.app')

@section('title', 'くじをひこう')
@section('content')
<div class="container">
    <div>
        <img src="https://placehold.jp/150x150.png" class="rounded mx-auto d-block" alt="説明っぽい画像">
        <a class="btn btn-primary" href="/k/{{ $lottery->uname }}/result">くじを引く</a>
    </div>
</div>
@endsection
