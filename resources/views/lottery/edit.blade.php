@extends('layouts.app')

@section('title', 'くじを入れよう')
@section('content')
<div class="container text-center">
    <p class="lead">{{ date('H:i', $lottery->deadline_at) }}までクジを入れられるよ！</p>
    <img src="https://placehold.jp/250x250.png" class="rounded mx-auto d-block" alt="説明っぽい画像">
    <lot uname="{{ $lottery->uname }}"></lot>

    <div class="mt-5 mx-auto row">
        <p class="col-10 mx-auto p-0">URLをシェアしてクジ作りを手伝ってもらおう！</p>
        <share-box url="{{ secure_url("/k/{$lottery->uname}/edit")  }}"></share-box>
    </div>
</div>
@endsection
