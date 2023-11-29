<html>

<head>
    <title>列出所有車商</title>
</head>

<body>
<h1>列出所有車商</h1>

<table>
    <tr>
        <th>編號</th>
        <th>車商名稱</th>
        <th>地區</th>
        <th>據點數量</th>
        <th>簡介</th>
        <th>網址</th>
    </tr>
    @for($i=0; $i<count($stores); $i++)
        <tr>
            <td>{{ $stores[$i]['id'] }}</td>
            <td>{{ $stores[$i]['name'] }}</td>
            <td>{{ $stores[$i]['country'] }}</td>
            <td>{{ $stores[$i]['service'] }}</td>
            <td>{{ $stores[$i]['info'] }}</td>
            <td><a href="{{ $stores[$i]['url'] }}">{{ $stores[$i]['url'] }}</a></td>
        </tr>
    @endfor
</table>

</body>

</html>
