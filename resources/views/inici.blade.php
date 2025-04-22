<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CalpaMafuta</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        .header {
            color: #000;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        .btn-primary {
            background-color: #000;
            color: #fff;
            border: 1px solid #000;
        }
        .btn-primary:hover {
            background-color: #333;
            border-color: #333;
        }
        .btn-outline {
            background-color: transparent;
            color: #000;
            border: 1px solid #000;
        }
        .btn-outline:hover {
            background-color: #f8f9fa;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: 1px solid #dc3545;
        }
        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Pàgina inicial de l'aplicació web</h1>
    </div>

    @if (Route::has('login'))
        @auth
            <div class="btn-group">
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard Admin</a>
                @else
                    <a href="{{ route('dashboard-consultor') }}" class="btn btn-primary">Dashboard Consultor</a>
                @endif
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline">Logout</button>
                </form>
            </div>
        @else
            <div class="btn-group">
                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
            </div>
        @endauth
    @endif
</body>
</html>