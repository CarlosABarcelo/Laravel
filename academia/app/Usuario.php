<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = [
        'email',
        'password',
        'nombre',
        'imagen',
        'profesor'
    ];

    public $timestamps = false;


/*
    public static function scopeSearch($query, $name)
    {

        return $query->where('titulo' , 'LIKE' , "%$name%");


    }

    public static function scopeSearchcat($query, $name)
    {
        return $query->where('id_categoria' , 'LIKE' , "%$name%");
    }*/}