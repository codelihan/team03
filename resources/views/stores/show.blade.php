@extends('app')

@section('title', '車商詳細資訊')

@section('bike_contents')
    <h1>車商詳細資訊</h1>

    <div>
        <p><strong>編號:</strong> {{ $store['id'] }}</p>
        <p><strong>車商名稱:</strong> {{ $store['name'] }}</p>
        <p><strong>地區:</strong> {{ $store['country'] }}</p>
        <p><strong>據點數量:</strong> {{ $store['service'] }}</p>
        <p><strong>簡介:</strong> {{ $store['info'] }}</p>
        <p><strong>網址:</strong> <a href="{{ $store['url'] }}">{{ $store['url'] }}</a></p>
    </div>

    <div>
        <a href="{{ route('stores.index') }}">返回</a>
        <a href="{{ route('stores.edit', ['id' => $store['id']]) }}">修改</a>
        <form action="{{ route('stores.destroy', $store['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>刪除</button>
        </form>
    </div>
@endsection
