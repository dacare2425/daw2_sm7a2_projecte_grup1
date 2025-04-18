<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\Master;
use Illuminate\Http\Request;

class AlumneController extends Controller
{
    public function index()
    {
        $alumnes = Alumne::with('master')->get();
        return view('alumnes.index', compact('alumnes'));
    }

    public function create()
    {
        $masters = Master::all();
        return view('alumnes.create', compact('masters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'correu' => 'required|email|unique:alumnes',
            'master_id' => 'required|exists:masters,id',
            // Agrega más validaciones según necesites
        ]);

        Alumne::create($request->all());

        return redirect()->route('alumnes.index')
            ->with('success', 'Alumne creat correctament');
    }

    // Implementa los demás métodos
}