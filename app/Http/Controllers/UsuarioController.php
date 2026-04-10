<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
   public function index()
    {
        $usuarios = Usuario::all();
        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|numeric',
            'correo' => 'required|email',
            'contrasena' => 'required'
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'correo' => $request->correo,
            'contrasena' => $request->contrasena
        ]);

        return redirect()->route('usuario.index')
        ->with('create', 'Usuario Registrado :D');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Vista de la actualizacion
     */
    public function edit(Usuario $usuario)
    {   
        //mandar a la vista junto con la informacion del usuario
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * ACTUALIZAR REGISTRO
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'correo' => 'required',
            'contrasena' => 'required',
        ]);

        //Enviar todos los datos para actualiar
        $usuario->update($request->all());

        //redirecionar al registro de usuarios
        return redirect()->route('usuario.index')
        ->with('update', 'Registro actualizado :D');
    }

    /**
     * Eliminar
     */
    public function destroy(Usuario $usuario)
    {
        //Funcion para elimionar un usuario
        $usuario -> delete();

        //redirecionar al registro de usuarios
        return redirect()->route('usuario.index')
        ->with('success', 'Registro eliminado :D');
    }

}
