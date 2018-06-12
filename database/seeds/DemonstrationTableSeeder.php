<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemonstrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('utilisateurs')->insert([
          'pseudo' => 'test',
          'email' => 'test@gmail.com',
          'mot_de_passe' => bcrypt('123456'),
          'actif' => '0',
          'niveau' => '3',
      ]);

      // Insertion d'une collecte
      DB::table('collectes')->insert([
          'nom' => 'Janvier 2018',
          'datedebut' => '2018-01-01',
          'datefin' => '2018-01-03',
          'poidspal' => '25',
          'poidsgrille' => '10',
      ]);

      // Insertion des fournisseurs
      DB::table('fournisseurs')->insert([
          'vif' => '02540085',
          'intitule' => 'Aldi Neuves Maisons',
          'enseigne' => 'Aldi',
          'ville' => 'Neuves Maisons',
          'codepostal' => '54230',
          'libellereduit' => 'Aldi Neuves Maisons',
          'actif' => '1',
      ]);
      DB::table('fournisseurs')->insert([
          'vif' => '02540005',
          'intitule' => 'Cora Houdemont',
          'enseigne' => 'Cora',
          'ville' => 'Houdemont',
          'codepostal' => '54180',
          'libellereduit' => 'Cora Houdemont',
          'actif' => '1',
      ]);
      DB::table('fournisseurs')->insert([
          'vif' => '02540051',
          'intitule' => 'Lidl Baccarat',
          'enseigne' => 'Lidl',
          'ville' => 'Baccarat',
          'codepostal' => '54120',
          'libellereduit' => 'Lidl Baccarat',
          'actif' => '0',
      ]);

      // Insertion des produits
      DB::table('produits')->insert([
          'id_fournisseur' => 'Aldi Neuves Maisons',
          'id_collecte' => 'Janvier 2018',
          'poids' => '3200',
          'nbpal' => '5',
          'nbgrille' => '1',
          'id_user' => 'admin',
          'valider' => '1',
          'creation' => '2018-01-01 00:00:00',
      ]);
      DB::table('produits')->insert([
          'id_fournisseur' => 'Cora Houdemont',
          'id_collecte' => 'Janvier 2018',
          'poids' => '890',
          'nbpal' => '2',
          'nbgrille' => '1',
          'id_user' => 'admin',
          'valider' => '1',
          'creation' => '2018-01-01 00:00:00',
      ]);
      DB::table('produits')->insert([
          'id_fournisseur' => 'Lidl Baccarat',
          'id_collecte' => 'Janvier 2018',
          'poids' => '350',
          'nbpal' => '1',
          'nbgrille' => '1',
          'id_user' => 'admin',
          'valider' => '0',
          'creation' => '2018-01-01 00:00:00',
      ]);
    }
}
