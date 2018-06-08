<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entradas')->truncate();

        DB::table('entradas')->insert([
            'titulo' => 'Números naturales',
            'slug' => 'numeros-naturales',
            'autor' => 'Seeder',
            'contenido' => '
<br><b>Representación de los números naturales</b>
<p>Los números naturales se pueden representar en una recta ordenados de menor a mayor.</p>
<p>Sobre una recta señalamos un punto, que marcamos con el número cero (0).<br>
A la derecha del cero, y con las mismas separaciones, situamos de menor a mayor los siguientes números naturales: 1, 2, 3...</p>',
            'resumen' => 'Representación de los números naturales',
            'id_categoria' => '7',
            'privado' => '0',
            'fichero' => 'mates1.png',
        ]);
        DB::table('entradas')->insert([
            'titulo' => 'Lexema y Morfema',
            'slug' => 'lexema',
            'autor' => 'Seeder',
            'contenido' => '
<br><b>Lexema y Morfema</b>
<p> Lexema o raíz: es la parte de la palabra que no varía y que contiene su significado.

zapato, zapatería, zapatero</p>
<p> Morfema: es la parte de la palabra que varía. Permite completar su significado (indicando género y número; si es un verbo, indicando además persona, tiempo y modo) o formar nuevas palabras (palabras derivadas) a partir de la palabra primitiva (subrayamos el morfema).

niños, zapatería, zapatero</p>',
            'resumen' => 'Lexema y Morfema',
            'id_categoria' => '8',
            'privado' => '0',
            'fichero' => 'Lengua2.pdf',
        ]);
    }
}
