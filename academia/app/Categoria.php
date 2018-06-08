<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $fillable = [
        'nombre',
        'descripcion',
        'color',
        'id_padre'
    ];

    public $timestamps = false;



/*
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
*/
}