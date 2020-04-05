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

    <div class="row">
        <p class="mx-auto mt-2">
            <a href="https://twitter.com/intent/tweet?text={{ urlencode("くじ引きにクジを入れるのを手伝ってください！\n" . secure_url("/k/{$lottery->uname}/edit") . "\n#" . config('app.name')) }}" target="_blank" rel="noopener"><img src="/img/twitter.png" class="col-2"></a>
            <a href="https://social-plugins.line.me/lineit/share?url={{ urlencode(secure_url("/k/{$lottery->uname}/edit")) }}"><img src="/img/line.png" class="col-2"></a>
        </p>
    </div>

    <a href="{{ secure_url("/k/{$lottery->uname}") }}" class="mt-4 btn btn-primary">このクジを引いてみる</a>
</div>
@endsection
