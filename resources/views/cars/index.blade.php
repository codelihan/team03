<html>

<head>
    <title>列出所有車種</title>
</head>
<body>
<h1>列出所有車種</h1>

@for($i=0; $i<count($cars); $i++)
    {{ $cars[$i]['id'] }}<br/>
    {{ $cars[$i]['stores'] }}<br/>
    {{ $cars[$i]['model'] }}<br/>
    {{ $cars[$i]['riding_noise'] }}<br/>
    {{ $cars[$i]['idle_noise'] }}<br/>
    {{ $cars[$i]['max_power'] }}<br/>
    {{ $cars[$i]['max_rpm'] }}<br/>
    {{ $cars[$i]['displacement'] }}<br/>
@endfor


</body>
</html>
