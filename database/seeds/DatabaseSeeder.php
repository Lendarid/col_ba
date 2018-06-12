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
            'actif' => '1',
            'niveau' => '1',
        ]);
        DB::table('utilisateurs')->insert([
            'pseudo' => 'consultant',
            'email' => 'consultant@gmail.com',
            'mot_de_passe' => bcrypt('123456'),
            'actif' => '1',
            'niveau' => '2',
        ]);
        DB::table('utilisateurs')->insert([
            'pseudo' => 'visiteur',
            'email' => 'visiteur@gmail.com',
            'mot_de_passe' => bcrypt('123456'),
            'actif' => '1',
            'niveau' => '3',
        ]);

        // MODIFICATION DES LOGOS DE BASE
        DB::table('images')->insert([
          'nom' => 'Lidl',
          'lien' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Lidl-Logo.svg/2000px-Lidl-Logo.svg.png',
        ]);
        DB::table('images')->insert([
          'nom' => 'Cora',
          'lien' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Logo_cora_2011.png/1200px-Logo_cora_2011.png',
        ]);
        DB::table('images')->insert([
          'nom' => 'Aldi',
          'lien' => 'http://www.reputatiolab.com/wp-content/uploads/2015/02/897px-Aldi_Markt_Logo.svg_.png',
        ]);
        DB::table('images')->insert([
          'nom' => 'Leclerc',
          'lien' => 'http://kaleido.pro/wp-content/uploads/2014/05/E.leclerc-logo.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Carrefour',
          'lien' => 'https://www.carrefour.fr/favicon-194x194.png',
        ]);
        DB::table('images')->insert([
          'nom' => 'Monoprix',
          'lien' => 'http://www.spoka.net/wp-content/uploads/2015/09/Monoprix.png',
        ]);
        DB::table('images')->insert([
          'nom' => 'Auchan',
          'lien' => 'https://upload.wikimedia.org/wikipedia/fr/archive/c/ce/20120504132214%21Logo_Auchan.svg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Intermarché',
          'lien' => 'https://www.justacote.com/photos_entreprises/intermarche-cournonsec-cournonsec-14026416460.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Casino',
          'lien' => 'http://www.franchise-groupecasino.fr/wp-content/uploads/2016/01/casino-super.png',
        ]);
        DB::table('images')->insert([
          'nom' => 'Hyper U',
          'lien' => 'http://www.2c-comm.com/wp-content/uploads/2017/08/logo_hyper_u.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Super U',
          'lien' => 'https://static4.pagesjaunes.fr/media/ugc/super_u_07627942_150358299',
        ]);
        DB::table('images')->insert([
          'nom' => 'Match',
          'lien' => 'http://bodysano.adsyme.netdna-cdn.com/wp-content/uploads/2015/04/Supermarches-Match-logo.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Leader Price',
          'lien' => 'https://www.obonprix.net/wp-content/uploads/2017/10/Leader_Price_2010_Logo.svg_.png',
        ]);
        DB::table('images')->insert([
          'nom' => 'Norma',
          'lien' => 'http://zonecommerciale-cormontreuil.com/upload/1300175667.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Grand frais',
          'lien' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Grand_Frais_logo.png/280px-Grand_Frais_logo.png',
        ]);
        DB::table('images')->insert([
          'nom' => 'Netto',
          'lien' => 'http://www.toute-la-franchise.com/images/zoom/reseaux/tgrd_centre/8112.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Dia',
          'lien' => 'http://www.toute-la-franchise.com/images/zoom/reseaux/tgrd_centre/646.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'G20',
          'lien' => 'https://www.habitants.fr/ul/enseigne/55b9cf-g20-jpg.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Metro',
          'lien' => 'https://www.lsa-conso.fr/mediatheque/3/2/1/000007123_87.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Promocash',
          'lien' => 'https://i2.wp.com/www.addictgroup.fr/wp-content/uploads/2017/04/logo-promocash.jpg?ssl=1',
        ]);
        DB::table('images')->insert([
          'nom' => 'Saveurs d\'orient',
          'lien' => 'http://www.saveursdorient.fr/medias/logo-Saveurs-dOrient.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Shopi',
          'lien' => 'https://www.justacote.com/photos_entreprises/shopi-le-havre-14150131910.jpg',
        ]);
        DB::table('images')->insert([
          'nom' => 'Spar',
          'lien' => 'https://i.pinimg.com/originals/e1/5f/db/e15fdb6587be579dcd0e5910b3b9b464.png',
        ]);
    }
}
