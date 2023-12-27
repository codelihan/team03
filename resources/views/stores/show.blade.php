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
    <h1>{{ $store['name'] }} 所有車款</h1>

    <table>
        <tr>
            <th>編號</th>
            <th>車商</th>
            <th>型號</th>
            <th>騎乘噪音值</th>
            <th>怠速噪音值</th>
            <th>最大馬力</th>
            <th>最大動力轉速</th>
            <th>排氣量</th>
        </tr>
        @foreach ($cars as $car)
            <tr>
                <td>{{ $car['id'] }}</td>
                <td>{{ $car->store->name }}</td>
                <td>{{ $car['model'] }}</td>
                <td>{{ $car['riding_noise'] }}</td>
                <td>{{ $car['idle_noise'] }}</td>
                <td>{{ $car['max_power'] }}</td>
                <td>{{ $car['max_rpm'] }}</td>
                <td>{{ $car['displacement'] }}</td>
            </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('stores.index') }}">返回</a>
        <a href="{{ route('stores.edit', ['id' => $store['id']]) }}">修改</a>
        <td>
            <form action="{{ url('/stores/delete', ['id' => $store->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button>刪除</button>
            </form>
        </td>
    </div>
@endsection
