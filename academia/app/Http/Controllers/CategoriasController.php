<?php

namespace App\Http\Controllers;

use App\Entrada;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{


    public function index(Request $request)
    {
        $categorias = Categoria::all();

        return view('categorias.index',compact('categorias'));




    }



}