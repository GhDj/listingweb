<?php

use Illuminate\Database\Seeder;
use App\Modules\General\Models\Address;
use App\Modules\Infrastructures\Models\Terrain;
use App\Modules\Infrastructures\Models\Complex;
use App\Modules\Infrastructures\Models\Equipment;
use App\Modules\Infrastructures\Models\Category;
use App\Modules\Infrastructure\Models\ComplexSchedule;

class InfrastruresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $firstAddress = Address::Create([
            'city' => 'Boran/Oise' ,
            'postal_code' => '60820' ,
            'country' => 'france' ,
            'locality' => Null ,
            'address' => 'LES MURETS 60820' ,
            'latitude' => 49.177976,
            'longitude' => 2.356591 ,
            'description' => 'SPORTFRANCE est composée d\'un effectif de 35 personnes sur un site de 25.000 m2 dont 5.518 m2 de bâtiments industriels et commerciaux, à BORAN SUR OISE en Picardie'

          ]);
          $secondAddress = Address::Create([
            'city' => 'Saint-Yrieix-la-Perche' ,
            'postal_code' => '87500' ,
            'country' => 'france' ,
            'locality' => Null ,
            'address' => 'Rue du Colonel du Garreau de la Mechenie' ,
            'latitude' => 45.506996,
            'longitude' => 1.198531 ,
            'description' => 'VillaSport | votre complexe sports, fitness & piscine'
          ]);



          $firstComplex = Complex::Create([

            'name' => 'sportfrance',
            'phone' => '0344219040' ,
            'email' => 'contact@sportfrance.com',
            'web_site' => 'http://www.sportfrance.com',
            'address_id' => $firstAddress->id

          ]);

          for($i=1;$i<=7;$i++){
              $firstComplex->schedules()->create([
                  'start_at' => '06:00:00',
                  'ends_at' => '18:30:00',
                  'day' => $i
              ]);
          }



          $secondComplex = Complex::Create([

            'name' => 'Villasport',
            'phone' => '0555586020' ,
            'email' => 'contact@villasport.com',
            'web_site' => 'http://villasport.fr/',
            'address_id' => $secondAddress->id

          ]);

          for($i=1;$i<=7;$i++){
              $secondComplex->schedules()->create([
                  'start_at' => '08:00:00',
                  'ends_at' => '18:30:00',
                  'day' => $i
              ]);
          }




          $firstCategory = Category::Create([

            'category' => 'Terrains Multisports',
            'complex_id' => $firstComplex->id

          ]);

          $secondCategory = Category::Create([

            'category' => 'Pisine',
            'complex_id' => $firstComplex->id

          ]);

          $thirdCategory = Category::Create([

            'category' => 'Fitness',
            'complex_id' => $firstComplex->id

          ]);

          $firstStadium = Terrain::Create([

            'name' => 'City Arena',
            'type' =>'MMMMM',
            'size' =>100,
            'complex_id' => $firstComplex->id,
            'category_id' =>  $firstCategory->id

          ]);

          for($i=1;$i<=7;$i++){
              $firstStadium->schedules()->create([
                  'start_at' => '10:00:00',
                  'ends_at' => '18:30:00',
                  'day' => $i
              ]);
          }

          $secondStadium = Terrain::Create([

            'name' => 'Terrains Multisports',
            'type' =>'MMMM',
            'size' =>200,
            'complex_id' => $firstComplex->id,
            'category_id' =>  $firstCategory->id

          ]);

          for($i=1;$i<=7;$i++){
              $secondStadium->schedules()->create([
                  'start_at' => '10:00:00',
                  'ends_at' => '18:30:00',
                  'day' => $i
              ]);
          }

          $thirdStadium = Terrain::Create([

            'name' => 'Terrains Futsal Hat Trick',
            'type' =>'MM',
            'size' =>300,
            'complex_id' => $firstComplex->id,
            'category_id' =>  $thirdCategory->id

          ]);

          for($i=1;$i<=7;$i++){
              $thirdStadium->schedules()->create([
                  'start_at' => '11:00:00',
                  'ends_at' => '18:30:00',
                  'day' => $i
              ]);
          }


           // ** //

           $fourthCategory = Category::Create([

             'category' => 'Espace Aquatique',
             'complex_id' => $secondComplex->id

           ]);

           $fifthCategory = Category::Create([

             'category' => 'Espace Forme',
             'complex_id' => $secondComplex->id

           ]);

           $sixthCategory = Category::Create([

             'category' => 'Espace Multisports',
             'complex_id' => $secondComplex->id

           ]);

           $fourthStadium = Terrain::Create([

             'name' => 'Un bassin polyvalent de nage et d’activités',
             'type' =>'Les espaces intérieurs',
             'size' =>375,
             'complex_id' => $secondComplex->id,
             'category_id' =>  $fourthCategory->id

           ]);

           for($i=1;$i<=7;$i++){
               $fourthStadium->schedules()->create([
                   'start_at' => '12:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }

           $fifthStadium = Terrain::Create([

             'name' => 'Un bassin ludique de détente et de loisirs',
             'type' =>'Les espaces extérieurs',
             'size' =>203,
             'complex_id' => $secondComplex->id,
             'category_id' =>  $fourthCategory->id

           ]);

           for($i=1;$i<=7;$i++){
               $fifthStadium->schedules()->create([
                   'start_at' => '11:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }
           $sixthStadium = Terrain::Create([

             'name' => 'Salle cardio-training',
             'type' =>'M',
             'size' =>110,
             'complex_id' => $secondComplex->id,
             'category_id' =>  $fifthCategory->id

           ]);

           for($i=1;$i<=7;$i++){
               $sixthStadium->schedules()->create([
                   'start_at' => '11:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }

           $seventhStadium = Terrain::Create([

             'name' => 'une salle de gymnase',
             'type' =>'Au sous-sol',
             'size' =>1449,
             'complex_id' => $secondComplex->id,
             'category_id' =>  $sixthCategory->id

           ]);

           for($i=1;$i<=7;$i++){
               $seventhStadium->schedules()->create([
                   'start_at' => '11:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }

           $thirdAddress = Address::Create([
             'city' => 'Nantes' ,
             'postal_code' => '44100' ,
             'country' => 'france' ,
             'locality' => Null ,
             'address' => ' 10 Rue Charles Brunellière' ,
             'latitude' => 47.209273,
             'longitude' => -1.569342 ,
             'description' => 'NantesSport | votre complexe sports, fitness & piscine'
           ]);

           $thirdComplex = Complex::Create([

             'name' => 'NantesSport',
             'phone' => '0555586020' ,
             'email' => 'contact@NantesSport.com',
             'web_site' => 'http://NantesSport.fr/',
             'address_id' => $thirdAddress->id

           ]);

           for($i=1;$i<=7;$i++){
               $thirdComplex->schedules()->create([
                   'start_at' => '06:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }




           $seventhCategory = Category::Create([

             'category' => 'Fitness',
             'complex_id' => $thirdComplex->id

           ]);

           $eighthStadium = Terrain::Create([

             'name' => 'Terrains Football Nantes',
             'type' =>'MM',
             'size' =>300,
             'complex_id' => $thirdComplex->id,
             'category_id' =>  $seventhCategory->id

           ]);

           for($i=1;$i<=7;$i++){
               $eighthStadium->schedules()->create([
                   'start_at' => '11:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }

           $fourthAddress = Address::Create([
             'city' => 'Nantes' ,
             'postal_code' => '44300' ,
             'country' => 'france' ,
             'locality' => Null ,
             'address' => 'Nantes Erdre 44300 Nantes' ,
             'latitude' => 47.258057,
             'longitude' => -1.524825 ,
             'description' => 'NantesSport | votre complexe sports, fitness & piscine'
           ]);

           $fourthComplex = Complex::Create([

             'name' => 'Nantes Erdre',
             'phone' => '0555586020' ,
             'email' => 'contact@NantesSport.com',
             'web_site' => 'http://NantesErdre.fr/',
             'address_id' => $fourthAddress->id

           ]);

           for($i=1;$i<=7;$i++){
               $fourthComplex->schedules()->create([
                   'start_at' => '11:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }



           $eighthCategory = Category::Create([

             'category' => 'Fitness',
             'complex_id' => $fourthComplex->id

           ]);

           $ninthStadium = Terrain::Create([

             'name' => 'Terrains Football Nantes Erdre',
             'type' =>'MM',
             'size' =>300,
             'complex_id' => $fourthComplex->id,
             'category_id' =>  $seventhCategory->id

           ]);

           for($i=1;$i<=7;$i++){
               $ninthStadium->schedules()->create([
                   'start_at' => '08:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }

           /******************/

           $fifthAddress = Address::Create([
             'city' => 'Boran-sur-Oise' ,
             'postal_code' => '60820' ,
             'country' => 'france' ,
             'locality' => Null ,
             'address' => 'Nantes Erdre 44300 Nantes' ,
             'latitude' => 49.177946,
             'longitude' => 2.368789 ,
             'description' => 'BoranSport | votre complexe sports, fitness & piscine'
           ]);

           $fifthComplex = Complex::Create([

             'name' => 'BoranSport',
             'phone' => '0555586020' ,
             'email' => 'contact@NantesSport.com',
             'web_site' => 'http://NantesErdre.fr/',
             'address_id' => $fifthAddress->id

           ]);

           for($i=1;$i<=7;$i++){
               $fifthComplex->schedules()->create([
                   'start_at' => '11:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }




           $eighthCategory = Category::Create([

             'category' => 'Football',
             'complex_id' => $fifthComplex->id

           ]);

           $tenthStadium = Terrain::Create([

             'name' => 'Terrains Football BoranSport',
             'type' =>'MM',
             'size' =>300,
             'complex_id' => $fifthComplex->id,
             'category_id' =>  $eighthCategory->id

           ]);

           for($i=1;$i<=7;$i++){
               $tenthStadium->schedules()->create([
                   'start_at' => '11:00:00',
                   'ends_at' => '18:30:00',
                   'day' => $i
               ]);
           }


              /************************/



              $sixthAddress = Address::Create([
                'city' => 'Saint-Yrieix-la-Perche' ,
                'postal_code' => '87500' ,
                'country' => 'france' ,
                'locality' => Null ,
                'address' => 'Saint-Yrieix-la-Perche 87500',
                'latitude' => 45.509360,
                'longitude' => 1.217267 ,
                'description' => 'BoranSport | votre complexe sports, fitness & piscine'
              ]);

              $sixthComplex = Complex::Create([

                'name' => 'SaintSport',
                'phone' => '0555586020' ,
                'email' => 'contact@SaintSport.com',
                'web_site' => 'http://NantesErdre.fr/',
                'address_id' => $sixthAddress->id

              ]);

              for($i=1;$i<=7;$i++){
                  $sixthComplex->schedules()->create([
                      'start_at' => '11:00:00',
                      'ends_at' => '18:30:00',
                      'day' => $i
                  ]);
              }




              $ninthCategory = Category::Create([

                'category' => 'Football',
                'complex_id' => $sixthComplex->id

              ]);

              $ninthStadium = Terrain::Create([

                'name' => 'Terrains Football SaintSport',
                'type' =>'MM',
                'size' =>300,
                'complex_id' => $sixthComplex->id,
                'category_id' =>  $ninthCategory->id

              ]);

              for($i=1;$i<=7;$i++){
                  $ninthStadium->schedules()->create([
                      'start_at' => '8:00:00',
                      'ends_at' => '18:30:00',
                      'day' => $i
                  ]);
              }






    }
}
