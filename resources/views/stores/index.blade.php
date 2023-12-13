@extends('app')

@section('title', '機車款式網站')

@section('bike_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        <a href="{{ route('stores.create') }} ">新增車商</a>
    </div>
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
        @foreach ($stores as $store)
            <tr>
                <td>{{ $store['id'] }}</td>
                <td>{{ $store['name'] }}</td>
                <td>{{ $store['country'] }}</td>
                <td>{{ $store['service'] }}</td>
                <td>{{ $store['info'] }}</td>
                <td><a href="{{ $store['url'] }}">{{ $store['url'] }}</a></td>
                <td><a href="{{ route('stores.show', $store['id']) }}">顯示</a></td>
                <td><a href="{{ route('stores.edit', $store['id']) }}">修改</a></td>
                <td>
                    <form action="{{ url('/stores/delete', ['id' => $store->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>刪除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
