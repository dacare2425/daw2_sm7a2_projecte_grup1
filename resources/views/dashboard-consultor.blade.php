<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel de Consultor - CalpaMafuta</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-800">Panel de Consultor</h1>
            
            <!-- Menú de navegación con nombre de usuario -->
            <nav class="flex items-center space-x-4">
                @auth
                <span class="text-gray-600 font-medium">Bienvenido, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-900 ml-4">Logout</button>
                </form>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tarjetas de resumen -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <!-- Tarjeta Masters -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-green-50 border-b border-green-200">
                        <h3 class="text-lg font-medium text-green-800">Masters</h3>
                        <a href="{{ route('masters.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Visualitzar Masters
                        </a>
                    </div>
                </div>

                <!-- Tarjeta Alumnos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-purple-50 border-b border-purple-200">
                        <h3 class="text-lg font-medium text-purple-800">Alumnos</h3>
                        <a href="{{ route('alumnes.index') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Visualitzar Alumnos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>