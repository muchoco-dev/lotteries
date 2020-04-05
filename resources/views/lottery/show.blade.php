@extends('layouts.app')

@section('title', 'くじをひこう')
@section('content')
<div class="container">
    <img src="https://placehold.jp/250x250.png" class="rounded mx-auto d-block" alt="説明っぽい画像">
    <div class="text-center">
        <a class="btn btn-primary mt-3" href="/k/{{ $lottery->uname }}/result">くじを引く</a>
    </div>
</div>
@endsection
