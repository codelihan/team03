<html>

<head>
    <title>列出所有車種</title>
</head>
<body>
<h1>列出所有車種</h1>

@for($i=0; $i<count($cars); $i++)
    { $car[$i]['id'}<br/>
    { $car[$i]['name'}<br/>
    { $car[$i]['country'}<br/>
    { $car[$i]['service'}<br/>
    { $car[$i]['info'}<br/>
    { $car[$i]['url'}<br/>
    { $car[$i]['created_at'}<br/>
    { $car[$i]['updated_at'}<br/>
@endfor


</body>
</html>
