<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EntradaSeeder::class);
    }
}
