@extends('app')

@section('title', '車款詳細資訊')

@section('bike_contents')
    <h1>車款詳細資訊</h1>

    <div>
        <p><strong>編號:</strong> {{ $car['id'] }}</p>
        <p><strong>車商:</strong> {{ $car->store->name }}</p>
        <p><strong>型號:</strong> {{ $car['model'] }}</p>
        <p><strong>騎乘噪音值:</strong> {{ $car['riding_noise'] }}</p>
        <p><strong>怠速噪音值:</strong> {{ $car['idle_noise'] }}</p>
        <p><strong>最大馬力:</strong> {{ $car['max_power'] }}</p>
        <p><strong>最大動力轉速:</strong> {{ $car['max_rpm'] }}</p>
        <p><strong>排氣量:</strong> {{ $car['displacement'] }}</p>
    </div>

    <div>
        <a href="{{ route('cars.index') }}">返回</a>
        @can('admin')
        <a href="{{ route('cars.edit', ['id' => $car['id']]) }}">修改</a>
        <form action="{{ route('cars.destroy', $car['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>刪除</button>
        </form>
        @endcan
        @can('manager')
        <a href="{{ route('cars.edit', ['id' => $car['id']]) }}">修改</a>
        @endcan
    </div>



@endsection
