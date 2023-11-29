@extends('app')

@section('title', '機車款式網站')

@section('bike_contents')
<h1>所有車商</h1>

<table>
    <tr>
        <th>編號</th>
        <th>車商名稱</th>
        <th>地區</th>
        <th>據點數量</th>
        <th>簡介</th>
        <th>網址</th>
        <th>操作1</th>
        <th>操作2</th>
        <th>操作3</th>
    </tr>
    @for($i=0; $i<count($stores); $i++)
        <tr>
            <td>{{ $stores[$i]['id'] }}</td>
            <td>{{ $stores[$i]['name'] }}</td>
            <td>{{ $stores[$i]['country'] }}</td>
            <td>{{ $stores[$i]['service'] }}</td>
            <td>{{ $stores[$i]['info'] }}</td>
            <td><a href="{{ $stores[$i]['url'] }}">{{ $stores[$i]['url'] }}</a></td>
            <td><a href="{{ route('stores.show', $stores[$i]['id']) }}">顯示</a></td>
            <td><a href="{{ route('stores.edit', $stores[$i]['id']) }}">修改</a></td>
            <td>
                <form action="{{ route('stores.destroy', $stores[$i]['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>刪除</button>
                </form>
        </tr>
    @endfor
</table>
@endsection