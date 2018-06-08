<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EntradasController extends Controller
{


    public function index(Request $request)
    {
        $categorias = Categoria::all();

        $entradas = Entrada::Search($request->titulo)->orderBy('id', 'asc')->paginate(6);
        $entradas = Entrada::Searchcat($request->id_categoria)->orderBy('id', 'asc')->paginate(6);

        return view('entradas.index')->with('entradas',$entradas)->with('categorias',$categorias);

    }

    public function show(Entrada $entrada)
    {
        return view('entradas.show',compact('entrada'));
    }

}