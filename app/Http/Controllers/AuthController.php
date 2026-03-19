<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //Metodo para regresar vista del formulario de registro
    public function registerForm(){
    return view('auth.register');
}

    //Metodo para guardar la informacion del registro
    public function register(Request $request){
        //Validacion de los campos del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
            //Guardar informacion en la BD
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_admin' => $request->has('is_admin')
        ]);

        //Inicioar sesion de forma automatica
        Auth::login($user);

        return redirect()->route('usuario.index');
        
    }

    //Metodo para regresar la vista del inicio de sesion
    public function loginForm(){
        return view('auth.login');
    }

    //Metodo para inicio de sesion
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('usuario.index');
    }

    return back()->withErrors([
        'email' => 'Datos incorrectos',
    ])->onlyInput('email');
}

    ///metodo para cerrar sesion
    public function logout(Request $request){

        //funcion 
        Auth::logout();

        //cierre de credenciales en la sesion
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return redirect('/acceso');
    }

    //Vista del panel del admnistrador
    public function adminDashboard(){
        return view('admin.dashboard');
    }


}

    

