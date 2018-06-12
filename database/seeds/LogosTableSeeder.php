<?php

use Illuminate\Database\Seeder;

class LogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('images')->insert([
          'nom' => 'Lidl',
          'lien' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Lidl-Logo.svg/2000px-Lidl-Logo.svg.png',
      ]);
    }
}
