<html>

<head>
    <title>列出所有車種</title>
</head>

<body>
<h1>列出所有車種</h1>

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
    @for($i=0; $i<count($cars); $i++)
        <tr>
            <td>{{ $cars[$i]['id'] }}</td>
            <td>{{ $cars[$i]['stores'] }}</td>
            <td>{{ $cars[$i]['model'] }}</td>
            <td>{{ $cars[$i]['riding_noise'] }}</td>
            <td>{{ $cars[$i]['idle_noise'] }}</td>
            <td>{{ $cars[$i]['max_power'] }}</td>
            <td>{{ $cars[$i]['max_rpm'] }}</td>
            <td>{{ $cars[$i]['displacement'] }}</td>
            <td><a href="{{ route('cars.show', $cars[$i]['id']) }}">顯示</a></td>
            <td><a href="{{ route('cars.edit', $cars[$i]['id']) }}">修改</a></td>
            <td>
                <form action="{{ route('cars.destroy', $cars[$i]['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>刪除</button>
                </form>

        </tr>
    @endfor
</table>

</body>

</html>
