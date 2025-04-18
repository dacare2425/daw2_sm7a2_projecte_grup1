<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Empresa</title>
</head>
<body>
<p>Pàgina informativa de l'aplicació web Projecte Calpa Mafuta</p>
<p>
Aquesta aplicació té 2 tipus d'usuaris:
<ol>
<li>Administrador: crea/modifica/esborra/visualitza usuaris, masters i alumnes</li>
<li>Consultor: visualitzar masters i alumnes</li>
</ol>
<a href="{{ url('/') }}">Inici</a><br>
</p>
</body>
</html>