@extends('layouts.app')

@section('title', 'くじの結果がでたよ')
@section('content')
<div class="container text-center">
    <div>
        @if ($lot)
        <p>{{ $lot->title }}</p>
        @else
        <p>このくじ引きにはクジが入っていないようです……</p>
        @endif
    </div>

    @if ($lot)
    <div>
    <a class="btn btn-primary"
       href="https://twitter.com/intent/tweet?text={{ urlencode("くじ引きで【{$lot->title}】があたったよ！\n" . secure_url("/k/{$lottery->uname}") . "\n#" . config('app.name')) }}" target="_blank" rel="noopener">
        結果をツイートする</a>
    </div>
    @endif
</div>
@endsection
