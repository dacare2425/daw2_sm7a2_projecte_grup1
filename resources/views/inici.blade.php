<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CalpaMafuta</title>
</head>
<body>
<p>Pàgina inicial de l'aplicació web</p>

@if (Route::has('login'))
    @auth
        <!-- Mostrado cuando el usuario ESTÁ autenticado -->
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
        </form>
    @else
        <!-- Mostrado cuando el usuario NO ESTÁ autenticado -->
        <a href="{{ route('login') }}">Log in</a>
        
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    @endauth
@endif
</body>
</html>