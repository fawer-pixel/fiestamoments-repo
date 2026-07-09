<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Fiesta Moments</title>

<style>

body{

margin:0;

background:#101010;

color:white;

font-family:Arial;

display:flex;

justify-content:center;

align-items:center;

height:100vh;

}

.card{

padding:45px;

background:#1d1d1d;

border-radius:15px;

text-align:center;

box-shadow:0 0 25px rgba(0,0,0,.35);

}

h1{

margin-top:0;

}

small{

color:#999;

}

</style>

</head>

<body>

<div class="card">

<h1>🎉 Fiesta Moments</h1>

<p><?= $message ?></p>

<small>Versión <?= APP_VERSION ?></small>

</div>

</body>

</html>
