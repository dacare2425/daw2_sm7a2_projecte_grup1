<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('auth');
        $this->middleware('role:Administrador'); */
    }

    // Listar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('users.llista', compact('users'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('users.crear');
    }

    // Almacenar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:Administrador,Consultor'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario creado correctamente');
    }

    // Mostrar detalles de un usuario
    public function show(User $user)
    {
        return view('users.mostra', compact('user'));
    }

    // Mostrar formulario de edición
    public function edit(User $user)
    {
        return view('users.editar', compact('user'));
    }

    // Actualizar usuario
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'in:Administrador,Consultor'],
        ];

        if ($request->email != $user->email) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
        }

        if ($request->filled('password')) {
            $rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];
        }

        $request->validate($rules);

        $user->name = $request->name;
        $user->role = $request->role;
        
        if ($request->email != $user->email) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar usuario
    public function destroy(User $user)
    {
        // No permitir auto-eliminación
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')
                ->with('error', 'No puedes eliminar tu propio usuario');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}