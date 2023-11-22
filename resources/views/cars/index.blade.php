<html>

<head>
    <title>列出所有車種</title>
</head>
<body>
<h1>列出所有車種</h1>

@for($i=0; $i<count($cars); $i++)
    { $car[$i]['id'}<br/>
    { $car[$i]['store'}<br/>
    { $car[$i]['model'}<br/>
    { $car[$i]['riding_noise'}<br/>
    { $car[$i]['idle_noise'}<br/>
    { $car[$i]['max_power'}<br/>
    { $car[$i]['mas_rpm'}<br/>
    { $car[$i]['displacement'}<br/>
    { $car[$i]['created_at'}<br/>
    { $car[$i]['updated_at'}<br/>
@endfor


</body>
</html>
