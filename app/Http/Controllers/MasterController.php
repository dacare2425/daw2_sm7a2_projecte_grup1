<?php

namespace App\Http\Controllers;

use App\Models\Master;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masters = Master::all();
        return view('masters.llista', compact('masters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'hores' => 'required|integer|min:1',
            'director' => 'required|string|max:255'
        ]);

        Master::create($validated);

        return redirect()->route('masters.index')
            ->with('success', 'Master creat correctament');
    }

    /**
     * Display the specified resource.
     */
    public function show(Master $master)
    {
        return view('masters.mostrar', compact('master'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Master $master)
    {
        return view('masters.editar', compact('master'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Master $master)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'hores' => 'required|integer|min:1',
            'director' => 'required|string|max:255'
        ]);

        $master->update($validated);

        return redirect()->route('masters.index')
            ->with('success', 'Master actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Master $master)
    {
        $master->delete();
        
        return redirect()->route('masters.index')
            ->with('success', 'Master eliminat correctament');
    }
}