<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use App\Models\Master;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AlumneController extends Controller
{

public function exportPdf($id)
{
    $alumne = Alumne::findOrFail($id);
    $pdf = Pdf::loadView('alumnes.pdf', compact('alumne'));
    return $pdf->download('alumne-'.$alumne->id.'.pdf');
}
    public function index()
    {
        $alumnes = Alumne::with('master')->get();
        return view('alumnes.llista', compact('alumnes'));
    }

    public function create()
    {
        $masters = Master::all();
        return view('alumnes.crear', compact('masters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'correu' => 'required|email|unique:alumnes,correu',
            'adreça' => 'required|string',
            'ciutat' => 'required|string',
            'pais' => 'required|string',
            'telefon' => 'required|string',
            'master_id' => 'required|exists:masters,id'
        ]);

        Alumne::create($validated);

        return redirect()->route('alumnes.index')
            ->with('success', 'Alumne creat correctament');
    }

    public function show(Alumne $alumne)
    {
        return view('alumnes.mostrar', compact('alumne'));
    }

    public function edit(Alumne $alumne)
    {
        $masters = Master::all();
        return view('alumnes.editar', compact('alumne', 'masters'));
    }

    public function update(Request $request, Alumne $alumne)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'correu' => 'required|email|unique:alumnes,correu,'.$alumne->id,
            'adreça' => 'required|string',
            'ciutat' => 'required|string',
            'pais' => 'required|string',
            'telefon' => 'required|string',
            'master_id' => 'required|exists:masters,id'
        ]);

        $alumne->update($validated);

        return redirect()->route('alumnes.index')
            ->with('success', 'Alumne actualitzat correctament');
    }

    public function destroy(Alumne $alumne)
    {
        $alumne->delete();
        
        return redirect()->route('alumnes.index')
            ->with('success', 'Alumne eliminat correctament');
    }
}