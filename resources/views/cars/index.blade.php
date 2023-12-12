@extends('app')

@section('title', '機車款式網站')

@section('bike_contents')
    <h1>所有車款</h1>

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
            <th>操作1</th>
            <th>操作2</th>
            <th>操作3</th>
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
                <td><a href="{{ route('cars.show', ['id'=>$car['id']]) }}">顯示</a></td>
                <td><a href="{{ route('cars.edit', ['id'=>$car['id']]) }}">修改</a></td>
                <td>
                    <form action="{{ route('cars.destroy', $car['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>刪除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
