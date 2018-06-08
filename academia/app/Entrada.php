<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{

    protected $fillable = [
        'titulo',
        'slug',
        'autor',
        'contenido',
        'resumen',
        'fecha_creacion',
        'id_categoria',
        'privado',
        'fichero'
    ];

    public $timestamps = false;



    public static function scopeSearch($query, $name)
    {

        return $query->where('titulo' , 'LIKE' , "%$name%");


    }

    public static function scopeSearchcat($query, $name)
    {
        return $query->where('id_categoria' , 'LIKE' , "%$name%");
    }}