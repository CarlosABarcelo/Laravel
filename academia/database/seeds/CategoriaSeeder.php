<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->truncate();

        DB::table('categorias')->insert([
            'id' => '1',
            'nombre' => '1ºESO',
            'descripcion' => 'Primero de la Eso',
            'color' => 'blue',
            'id_padre' => '0',
        ]);
        DB::table('categorias')->insert([
            'id' => '2',
            'nombre' => '2ºESO',
            'descripcion' => 'Segundo de la Eso',
            'color' => 'blue',
            'id_padre' => '0',
        ]);
        DB::table('categorias')->insert([
            'id' => '3',
            'nombre' => '3ºESO',
            'descripcion' => 'Tercero de la Eso',
            'color' => 'blue',
            'id_padre' => '0',
        ]);
        DB::table('categorias')->insert([
            'id' => '4',
            'nombre' => '4ºESO',
            'descripcion' => 'Cuarto de la Eso',
            'color' => 'blue',
            'id_padre' => '0',
        ]);
        DB::table('categorias')->insert([
            'id' => '5',
            'nombre' => '1ºBACHILLER',
            'descripcion' => 'Primero Bachiller',
            'color' => 'orange',
            'id_padre' => '0',
        ]);
        DB::table('categorias')->insert([
            'id' => '6',
            'nombre' => '2ºBACHILLER',
            'descripcion' => 'Segundo Bachiller',
            'color' => 'orange',
            'id_padre' => '0',
        ]);
        DB::table('categorias')->insert([
            'id' => '7',
            'nombre' => 'Matematicas',
            'descripcion' => 'Matematicas Primero ESO',
            'color' => 'blue',
            'id_padre' => '1',
        ]);
        DB::table('categorias')->insert([
            'id' => '8',
            'nombre' => 'Lengua',
            'descripcion' => 'Lengua Segundo ESO',
            'color' => 'blue',
            'id_padre' => '2',
        ]);
    }
}
