@extends('app')

@section('title', '機車款式網站')

@section('bike_contents')
    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
        @can('admin')
        <a href="{{ route('cars.create') }} ">新增車款</a>
        @endcan
        <a href="{{ route('cars.white_licenceplate') }} ">白牌車款</a>
        <a href="{{ route('cars.yellow_licenceplate') }} ">黃牌車款</a>
        <a href="{{ route('cars.red_licenceplate') }} ">紅牌車款</a>
        <select id="storeSelect">
            <option value="" {{ empty($selectedStore) ? 'selected' : '' }}>所有車款</option>
            @foreach ($stores as $store)
            <option value="{{ $store->id }}" {{ $store->id == $selectedStore ? 'selected' : '' }}>{{ $store->name }}</option>
            @endforeach
        </select>

<script>
document.getElementById('storeSelect').addEventListener('change', function() {
    window.location.href = '?store=' + this.value;
});
</script>
    </div>
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
            @can('admin')
            <th>操作2</th>
            <th>操作3</th>
            @elsecan('manager')
            <th>操作2</th>
            @endcan
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
                @can('admin')
                <td><a href="{{ route('cars.edit', ['id'=>$car['id']]) }}">修改</a></td>
                <td>
                    <form action="{{ route('cars.destroy', $car['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>刪除</button>
                    </form>
                </td>
                @elsecan('manager')
                <td><a href="{{ route('cars.edit', ['id'=>$car['id']]) }}">修改</a></td>
                @endcan
            </tr>
        @endforeach
    </table>
    {{ $cars->withQueryString()->links() }}
@endsection
