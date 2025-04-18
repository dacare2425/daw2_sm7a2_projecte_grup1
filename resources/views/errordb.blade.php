<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Error d'accés a la BD</title>
</head>
<body>
<h1>Atenció!!!!</h1>
<p>Error tipus: "SQLSTATE[HY000] [2002] Connection refused"</p>
<p>
Comprova que:
<ol>
<li>El servidor MySQL està en marxa</li>
<li>L'adreça IP i/o nom del host són correctes</li>
<li>El port del servidor és correcte</li>
<li>El nom d'usuari i contrasenya són correctes</li>
<li>El fitxer de configuració de Laravel és correcte</li>
</ol>
</p>
</body>
</html>