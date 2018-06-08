<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'Carlos Alarcón',
            'email' => 'carlos25752@msn.com',
            'password' => bcrypt('123456'),
            'imagen' => 'son.jpg',
            'profesor' => '0',
        ]);
        DB::table('users')->insert([
            'name' => 'Carlos Abrisqueta',
            'email' => 'iescierva.carlos@gmail.com',
            'password' => bcrypt('123456'),
            'imagen' => 'son.jpg',
            'profesor' => '1',
        ]);
    }
}
