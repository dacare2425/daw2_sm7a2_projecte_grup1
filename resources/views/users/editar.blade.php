@extends('layouts.app')

@section('content')
<h1>Editar Usuari</h1>

<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" 
               value="{{ $user->name }}" required>
    </div>
    
    <div class="mb-3">
        <label for="email" class="form-label">Correu electrònic</label>
        <input type="email" class="form-control" id="email" name="email" 
               value="{{ $user->email }}" required>
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Nova contrasenya (deixar en blanc per no canviar)</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirmar nova contrasenya</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    
    <div class="mb-3">
        <label for="role" class="form-label">Rol</label>
        <select class="form-select" id="role" name="role" required>
            <option value="Administrador" {{ $user->role == 'Administrador' ? 'selected' : '' }}>Administrador</option>
            <option value="Consultor" {{ $user->role == 'Consultor' ? 'selected' : '' }}>Consultor</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Actualitzar</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel·lar</a>
</form>
@endsection