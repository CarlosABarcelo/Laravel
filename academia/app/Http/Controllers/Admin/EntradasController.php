<?php

namespace App\Http\Controllers\Admin;

use App\Categoria;
use App\Entrada;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EntradasController extends Controller
{

    public function index()
    {
        $entradas = Entrada::all();
        $categorias = Categoria::all();
        return view('admin.entradas.index',compact('entradas','categorias'));
    }



    public function store(Request $request)
    {

        $this->validate($request , [
            'titulo' => 'required',
            'contenido' => 'required',

        ]);

        $entradas = new Entrada();

        $entradas->titulo = $request->titulo;
        $entradas->slug = self::slug($request->titulo);
        $entradas->autor = auth()->user()->name;
        $entradas->contenido = $request->contenido;
        $entradas->resumen = $request->resumen;

        $entradas->id_categoria = $request->id_categoria;
        $entradas->privado = $request->privado;
        $entradas->fichero = $request->fichero;
        //dd($entradas->fichero);
            $destinationPath = 'uploads';
            $filename = $entradas->fichero->getClientOriginalName();
            $entradas->fichero->move($destinationPath, $filename);

        $entradas->fichero = $entradas->fichero->getClientOriginalName();

        $entradas->save();


        return redirect()->route('admin.entradas.index')->with('success','Entrada creada');

    }

    public function create()
    {
        $entradas = Entrada::all(); $categorias = Categoria::all();
        return view('admin.entradas.create',compact('entradas','categorias'));
    }



    public function edit(Entrada $entrada)
    {
         $categorias = Categoria::all();

        return view('admin.entradas.edit',compact('entrada','categorias'));
    }
/*
    public function show(Entrada $entrada)
    {
        return view('admin.entradas.show',compact('entrada'));
    }
*/
    public function update(Request $request, Entrada $entrada)
    {

        $this->validate($request , [
            'titulo' => 'required',
            'contenido' => 'required',

        ]);

        $entrada->titulo = $request->titulo;
        $entrada->slug = self::slug($request->titulo);
        $entrada->autor = auth()->user()->name;
        $entrada->contenido = $request->contenido;
        $entrada->resumen = $request->resumen;

        $entrada->id_categoria = $request->id_categoria;
        $entrada->privado = $request->privado;
        $entrada->fichero = $request->fichero;
        //dd($entradas->fichero);
            $destinationPath = 'uploads';

            $filename = $entrada->fichero->getClientOriginalName();

            $entrada->fichero->move($destinationPath, $filename);

            $entrada->fichero = $entrada->fichero->getClientOriginalName();

        $entrada->save();

        //$entrada->update($request->all());

        return redirect()->route('admin.entradas.index')->with('success','Entrada editada');

    }

    public function destroy(Entrada $entrada)
    {

        $entrada->delete();

        return redirect()->route('admin.entradas.index')->with('success','Entrada eliminada');
    }



    public static function slug($string) {
        $characters = array(
            "Á" => "A", "Ç" => "c", "É" => "e", "Í" => "i", "Ñ" => "n", "Ó" => "o", "Ú" => "u",
            "á" => "a", "ç" => "c", "é" => "e", "í" => "i", "ñ" => "n", "ó" => "o", "ú" => "u",
            "à" => "a", "è" => "e", "ì" => "i", "ò" => "o", "ù" => "u"
        );

        $string = strtr($string, $characters);
        $string = strtolower(trim($string));
        $string = preg_replace("/[^a-z0-9-]/", "-", $string);
        $string = preg_replace("/-+/", "-", $string);

        if(substr($string, strlen($string) - 1, strlen($string)) === "-") {
            $string = substr($string, 0, strlen($string) - 1);
        }

        return $string;
    }

    public static function fichero(){

            $directorio = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
            if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $directorio . date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"]))
                $fichero = "/uploads/". date('m-d-Y-g:ia-'). $_FILES["fichero"]["name"];

    }
}