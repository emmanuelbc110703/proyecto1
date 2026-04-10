<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;

class MaestroController extends Controller
{
    public function index()
    {
        $maestros = Maestro::all();
        return view('maestro.index', compact('maestros'));
    }

    public function create()
    {
        return view('maestro.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'materias' => 'required',
            'correo' => 'required|email|unique:maestros',
            'matricula' => 'required|unique:maestros'
        ]);

        Maestro::create($request->only('nombre', 'materias', 'correo', 'matricula'));

        return redirect()->route('maestro.index')
            ->with('success', 'Maestro registrado correctamente');
    }

    public function edit(Maestro $maestro)
    {
        return view('maestro.edit', compact('maestro'));
    }

    public function update(Request $request, Maestro $maestro)
    {
        $request->validate([
            'nombre' => 'required',
            'materias' => 'required',
            'correo' => 'required|email|unique:maestros,correo,' . $maestro->id,
            'matricula' => 'required|unique:maestros,matricula,' . $maestro->id
        ]);

        $maestro->update($request->only('nombre', 'materias', 'correo', 'matricula'));

        return redirect()->route('maestro.index')
            ->with('success', 'Maestro actualizado correctamente');
    }

    public function destroy(Maestro $maestro)
    {
        $maestro->delete();

        return redirect()->route('maestro.index')
            ->with('success', 'Maestro eliminado correctamente');
    }
}