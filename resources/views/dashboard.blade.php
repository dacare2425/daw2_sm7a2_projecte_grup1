<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard dels usuaris tipus admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="{{ route('register') }}">Crea un nou usuari</a><br>
    </div>
    <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url('masters/llista') }}">Masters: Visualització</a><br>
                    <a href="{{ url('alumnes/llista') }}">Alumnes: Visualització</a>
                </div>

                @auth
    @if(auth()->user()->role === 'Administrador')
        <a href="{{ route('users.index') }}" class="btn btn-admin">Gestión de Usuarios</a>
    @endif
    
    <a href="{{ route('masters.index') }}" class="btn btn-primary">Ver Masters</a>
    <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Ver Alumnos</a>
@endauth
</x-app-layout>
