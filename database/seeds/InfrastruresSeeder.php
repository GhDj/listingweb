<?php

use Illuminate\Database\Seeder;
use App\Modules\General\Models\Address;
use App\Modules\Infrastructures\Models\Complex;
use App\Modules\Infrastructures\Models\Terrain;
use App\Modules\Infrastructures\Models\Equipment;
use App\Modules\Infrastructures\Models\Category;

class InfrastruresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $adresse1 = Address::Create([
            'city' => 'Boran/Oise' ,
            'postal_code' => '60820' ,
            'country' => 'france' ,
            'locality' => Null ,
            'address' => 'LES MURETS 60820' ,
            'latitude' => 49.177976,
            'longitude' => 2.356591 ,
            'description' => 'SPORTFRANCE est composée d\'un effectif de 35 personnes sur un site de 25.000 m2 dont 5.518 m2 de bâtiments industriels et commerciaux, à BORAN SUR OISE en Picardie'

          ]);
          $adresse2 = Address::Create([
            'city' => 'Saint-Yrieix-la-Perche' ,
            'postal_code' => '87500' ,
            'country' => 'france' ,
            'locality' => Null ,
            'address' => 'Rue du Colonel du Garreau de la Mechenie' ,
            'latitude' => 45.506996,
            'longitude' => 1.198531 ,
            'description' => 'VillaSport | votre complexe sports, fitness & piscine'
          ]);



          $complexe1 = Complex::Create([

            'name' => 'sportfrance',
            'phone' => '0344219040' ,
            'email' => 'contact@sportfrance.com',
            'web_site' => 'http://www.sportfrance.com',
            'address_id' => $adresse1->id

          ]);



          $complexe2 = Complex::Create([

            'name' => 'Villasport',
            'phone' => '0555586020' ,
            'email' => 'contact@villasport.com',
            'web_site' => 'http://villasport.fr/',
            'address_id' => $adresse2->id

          ]);



          $category1 = Category::Create([

            'category' => 'Terrains Multisports',
            'complex_id' => $complexe1->id

          ]);

          $category2 = Category::Create([

            'category' => 'Pisine',
            'complex_id' => $complexe1->id

          ]);

          $category3 = Category::Create([

            'category' => 'Fitness',
            'complex_id' => $complexe1->id

          ]);

          $terrain1 = Terrain::Create([

            'name' => 'City Arena',
            'type' =>'MMMMM',
            'size' =>100,
            'complex_id' => $complexe1->id,
            'category_id' =>  $category1->id

          ]);

          $terrain2 = Terrain::Create([

            'name' => 'Terrains Multisports',
            'type' =>'MMMM',
            'size' =>200,
            'complex_id' => $complexe1->id,
            'category_id' =>  $category1->id

          ]);
          $terrain3 = Terrain::Create([

            'name' => 'Terrains Futsal Hat Trick',
            'type' =>'MM',
            'size' =>300,
            'complex_id' => $complexe1->id,
            'category_id' =>  $category1->id

          ]);


           // ** //

           $category4 = Category::Create([

             'category' => 'Espace Aquatique',
             'complex_id' => $complexe2->id

           ]);

           $category5 = Category::Create([

             'category' => 'Espace Forme',
             'complex_id' => $complexe2->id

           ]);

           $category6 = Category::Create([

             'category' => 'Espace Multisports',
             'complex_id' => $complexe2->id

           ]);

           $terrain4 = Terrain::Create([

             'name' => 'Un bassin polyvalent de nage et d’activités',
             'type' =>'Les espaces intérieurs',
             'size' =>375,
             'complex_id' => $complexe2->id,
             'category_id' =>  $category4->id

           ]);

           $terrain5 = Terrain::Create([

             'name' => 'Un bassin ludique de détente et de loisirs',
             'type' =>'Les espaces extérieurs',
             'size' =>203,
             'complex_id' => $complexe2->id,
             'category_id' =>  $category4->id

           ]);
           $terrain6 = Terrain::Create([

             'name' => 'Salle cardio-training',
             'type' =>'M',
             'size' =>110,
             'complex_id' => $complexe2->id,
             'category_id' =>  $category5->id

           ]);

           $terrain7 = Terrain::Create([

             'name' => 'une salle de gymnase',
             'type' =>'Au sous-sol',
             'size' =>1449,
             'complex_id' => $complexe2->id,
             'category_id' =>  $category6->id

           ]);

           $adresse3 = Address::Create([
             'city' => 'Nantes' ,
             'postal_code' => '44100' ,
             'country' => 'france' ,
             'locality' => Null ,
             'address' => ' 10 Rue Charles Brunellière' ,
             'latitude' => 47.209273,
             'longitude' => -1.569342 ,
             'description' => 'NantesSport | votre complexe sports, fitness & piscine'
           ]);

           $complexe3 = Complex::Create([

             'name' => 'NantesSport',
             'phone' => '0555586020' ,
             'email' => 'contact@NantesSport.com',
             'web_site' => 'http://NantesSport.fr/',
             'address_id' => $adresse3->id

           ]);


           $category7 = Category::Create([

             'category' => 'Fitness',
             'complex_id' => $complexe3->id

           ]);

           $terrain8 = Terrain::Create([

             'name' => 'Terrains Football Nantes',
             'type' =>'MM',
             'size' =>300,
             'complex_id' => $complexe3->id,
             'category_id' =>  $category7->id

           ]);

           $adresse4 = Address::Create([
             'city' => 'Nantes' ,
             'postal_code' => '44300' ,
             'country' => 'france' ,
             'locality' => Null ,
             'address' => 'Nantes Erdre 44300 Nantes' ,
             'latitude' => 47.258057,
             'longitude' => -1.524825 ,
             'description' => 'NantesSport | votre complexe sports, fitness & piscine'
           ]);

           $complexe4 = Complex::Create([

             'name' => 'Nantes Erdre',
             'phone' => '0555586020' ,
             'email' => 'contact@NantesSport.com',
             'web_site' => 'http://NantesErdre.fr/',
             'address_id' => $adresse4->id

           ]);


           $category8 = Category::Create([

             'category' => 'Fitness',
             'complex_id' => $complexe4->id

           ]);

           $terrain9 = Terrain::Create([

             'name' => 'Terrains Football Nantes Erdre',
             'type' =>'MM',
             'size' =>300,
             'complex_id' => $complexe4->id,
             'category_id' =>  $category7->id

           ]);

           /******************/

           $adresse5 = Address::Create([
             'city' => 'Boran-sur-Oise' ,
             'postal_code' => '60820' ,
             'country' => 'france' ,
             'locality' => Null ,
             'address' => 'Nantes Erdre 44300 Nantes' ,
             'latitude' => 49.177946,
             'longitude' => 2.368789 ,
             'description' => 'BoranSport | votre complexe sports, fitness & piscine'
           ]);

           $complexe5 = Complex::Create([

             'name' => 'BoranSport',
             'phone' => '0555586020' ,
             'email' => 'contact@NantesSport.com',
             'web_site' => 'http://NantesErdre.fr/',
             'address_id' => $adresse5->id

           ]);


           $category8 = Category::Create([

             'category' => 'Football',
             'complex_id' => $complexe5->id

           ]);

           $terrain9 = Terrain::Create([

             'name' => 'Terrains Football BoranSport',
             'type' =>'MM',
             'size' =>300,
             'complex_id' => $complexe5->id,
             'category_id' =>  $category8->id

           ]);


              /************************/



              $adresse6 = Address::Create([
                'city' => 'Saint-Yrieix-la-Perche' ,
                'postal_code' => '87500' ,
                'country' => 'france' ,
                'locality' => Null ,
                'address' => 'Saint-Yrieix-la-Perche 87500',
                'latitude' => 45.509360,
                'longitude' => 1.217267 ,
                'description' => 'BoranSport | votre complexe sports, fitness & piscine'
              ]);

              $complexe6 = Complex::Create([

                'name' => 'SaintSport',
                'phone' => '0555586020' ,
                'email' => 'contact@SaintSport.com',
                'web_site' => 'http://NantesErdre.fr/',
                'address_id' => $adresse6->id

              ]);


              $category9 = Category::Create([

                'category' => 'Football',
                'complex_id' => $complexe6->id

              ]);

              $terrain9 = Terrain::Create([

                'name' => 'Terrains Football SaintSport',
                'type' =>'MM',
                'size' =>300,
                'complex_id' => $complexe6->id,
                'category_id' =>  $category9->id

              ]);





    }
}
