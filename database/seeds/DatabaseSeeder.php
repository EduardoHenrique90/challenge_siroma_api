<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'name' => 'Eduardo Henrique Machado de Araujo',
            'password' => bcrypt('12345'),
            'cpf' => '39029728825',
            'email' => 'eduhenrique178@gmail.com',
            'born_date' => '1990-09-30',
        ]);
    }
}
