<html>

<head>
    <title>列出所有車種</title>
</head>
<body>
<h1>列出所有車種</h1>

@for($i=0; $i<count($stores); $i++)
    {{ $stores[$i]['id'] }}<br/>
    {{ $stores[$i]['name'] }}<br/>
    {{ $stores[$i]['country'] }}<br/>
    {{ $stores[$i]['service'] }}<br/>
    {{ $stores[$i]['info'] }}<br/>
    {{ $stores[$i]['url'] }}<br/>
@endfor


</body>
</html>
