<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Website</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="visitorInfo">
        <h2>Información del Visitante</h2>
        <ul>
            <li><strong>Continente:</strong> <span id="continent"></span></li>
            <li><strong>País:</strong> <span id="country"></span></li>
            <li><strong>Ciudad:</strong> <span id="city"></span></li>
        </ul>
    </div>

    <script type="text/javascript">
        $.getJSON('http://ipwhois.app/json/', function(ip) {
            $('#continent').text(ip.continent);
            $('#country').text(ip.country);
            $('#city').text(ip.city);
        });
    </script>
</body>

</html>