<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{



    public function index()
    {
        $categorias = Categoria::all();

        return view('admin.categorias.index',compact('categorias'));
    }

    public function store(Request $request)
    {

        $this->validate($request , [
            'nombre' => 'required',
            'descripcion' => 'required',

        ]);

        $categoria = new Categoria();

        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->color = $request->color;
        $categoria->id_padre = $request->id_padre;

        $categoria->save();

        return redirect()->route('admin.categorias.index')->with('success','Categoría creada');

    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.create',compact('categorias'));
    }



        public function edit(Categoria $categoria)
        {
            $listadocategorias = Categoria::all();

            return view('admin.categorias.edit',compact('categoria','listadocategorias'));
        }
/*
        public function show(Category $category)
        {
            return view('admin.categories.show',compact('category'));
        }
*/
        public function update(Request $request, Categoria $categoria)
        {

            $this->validate($request , [
                'nombre' => 'required',
                'descripcion' => 'required',
                'color' => 'required',
            ]);

            $categoria->update($request->all());

            return redirect()->route('admin.categorias.index')->with('success','Categoria editada');

        }

    public function destroy(Categoria $categoria)
    {

        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('success','Categoria eliminada');
    }

}