<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilisateurs')->insert([
            'pseudo' => 'admin',
            'email' => 'admin@gmail.com',
            'mot_de_passe' => bcrypt('123456'),
            'niveau' => '1',
        ]);
    }
}
