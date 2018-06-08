<?php

namespace App\Http\Controllers\Admin;


use App\User;
use App\Usuario;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{

    public function index()
    {
        $usuarios = User::all();

        return view('admin.usuarios.index',compact('usuarios'));
    }



    public function store(Request $request)
    {

        $this->validate($request , [
            'email' => 'required',
            'password' => 'required',

        ]);

        $usuarios = new User();

        $usuarios->email = $request->email;
        $usuarios->password = bcrypt($request->password);
       // $usuarios->password = $request->password;
        $usuarios->name = $request->name;
        $usuarios->imagen = $request->imagen;

        $destinationPath = 'uploads';
        $filename = $usuarios->imagen->getClientOriginalName();
        $usuarios->imagen->move($destinationPath, $filename);

        $usuarios->imagen = $usuarios->imagen->getClientOriginalName();


        $usuarios->profesor = $request->profesor;


        $usuarios->save();


        return redirect()->route('admin.usuarios.index')->with('success','usuario creado');

    }

        public function create()
        {
            $usuarios = User::all();
            return view('admin.usuarios.create',compact('usuarios'));
        }

        public function edit(User $usuario)
        {
            $usuarios = User::all();

            return view('admin.usuarios.edit',compact('usuario'));
        }

        /*
            public function show(Entrada $entrada)
            {
                return view('admin.entradas.show',compact('entrada'));
            }
*/
        public function update(Request $request, User $usuario)
        {

            $this->validate($request , [
                'email' => 'required',


            ]);


            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);
            // $usuarios->password = $request->password;
            $usuario->name = $request->name;
            $usuario->imagen = $request->imagen;

            $destinationPath = 'uploads';
            $filename = $usuario->imagen->getClientOriginalName();
            $usuario->imagen->move($destinationPath, $filename);

            $usuario->imagen = $usuario->imagen->getClientOriginalName();


            $usuario->profesor = $request->profesor;


            $usuario->save();

            return redirect()->route('admin.usuarios.index')->with('success','Usuario editado');

        }

        public function destroy(User $usuario)
        {

            $usuario->delete();

            return redirect()->route('admin.usuarios.index')->with('success','Usuario eliminado');
        }


}