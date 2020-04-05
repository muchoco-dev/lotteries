@extends('layouts.app')

@section('title', 'くじをひこう')
@section('content')
<div class="container text-center">
    <img src="https://placehold.jp/250x250.png" class="rounded mx-auto d-block" alt="説明っぽい画像">
    <div>
        <a class="btn btn-primary mt-3" href="/k/{{ $lottery->uname }}/result">くじを引く</a>
    </div>

    <div class="mt-5 mx-auto row">
        <p class="col-10 mx-auto p-0 mb-0">このクジをシェアする</p>
        <share-box url="{{ secure_url("/k/{$lottery->uname}")  }}"></share-box>
    </div>
</div>
@endsection
