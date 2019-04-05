<?php

use Illuminate\Database\Seeder;
use App\Modules\General\Models\Address;
use App\Modules\Complex\Models\Terrain;
use App\Modules\Complex\Models\Complex;
use App\Modules\Complex\Models\Category;
use App\Modules\Infrastructure\Models\ComplexSchedule;
use App\Modules\User\Models\User;
use App\Modules\Reviews\Models\Review;
use App\Modules\Complex\Models\Sport;
use App\Modules\Complex\Models\ComplexCategory;
use App\Modules\General\Models\Media;

use Carbon\Carbon;

class ComplexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $firstSpeciality  = Sport::Create([
            'title' => 'Football'
        ]);
        $secondSpeciality  = Sport::Create([
            'title' => 'Handball'
        ]);

        $thirdSpeciality  = Sport::Create([
            'title' => 'Nataion'
        ]);
        $fourthSpeciality  = Sport::Create([
            'title' => 'Gym'
        ]);


        $frontFirstImagePath = 'img/1.jpg';
        $frontSecondImagePath = 'img/2.jpg';
        $frontThirdtPath = 'img/3.jpg';
        $fronFourtPath = 'img/4.jpg';
        $frontFifthPath = 'img/5.jpg';
        $frontSixtPath = 'img/6.jpg';

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
            'description' => 'VillaSport | votre Complex sports, fitness & piscine'
        ]);



        $firstComplex = Complex::Create([

            'name' => 'sportfrance',
            'phone' => '0344219040' ,
            'email' => 'contact@sportfrance.com',
            'web_site' => 'http://www.sportfrance.com',
            'address_id' => $firstAddress->id,
            'user_id' => 1

        ]);

        for($i=1;$i<=7;$i++){
            $firstComplex->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 06:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }



        $secondComplex = Complex::Create([

            'name' => 'Villasport',
            'phone' => '0555586020' ,
            'email' => 'contact@villasport.com',
            'web_site' => 'http://villasport.fr/',
            'address_id' => $secondAddress->id,
            'user_id' => 1

        ]);

        for($i=1;$i<=7;$i++){
            $secondComplex->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 08:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }




        $firstCategory = Category::Create([

            'title' => 'Terrains Multisports'

        ]);

        $secondCategory = Category::Create([

            'title' => 'Pisine',


        ]);



        $thirdCategory = Category::Create([

            'title' => 'Fitness',


        ]);


        ComplexCategory::create([
            'category_id'=>$firstCategory->id,
            'complex_id'=>$firstComplex->id
        ]);

        ComplexCategory::create([
            'category_id'=>$secondCategory->id,
            'complex_id'=>$firstComplex->id
        ]);

        ComplexCategory::create([
            'category_id'=>$thirdCategory->id,
            'complex_id'=>$firstComplex->id
        ]);

        $firstStadium = Terrain::Create([

            'name' => 'City Arena',
            'height' =>150,
            'length'=>100,
            'width'=>200,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>0,
            'video_recorder'=>1,
            'terrain_nature'=>'decouvert',
            'soil_type'=>'gazon',
            'complex_id' => $firstComplex->id,
            'sport_id' => $firstSpeciality->id,
            'category_id' =>  $firstCategory->id

        ]);

        $firstfilename = 'frontImage1'.$firstStadium->id.'.jpg';
        $secondfilename = 'frontImage2'.$firstStadium->id.'.jpg';

        copy(public_path($frontFirstImagePath), public_path('storage/uploads/terrains/'.$firstfilename));
        copy(public_path($frontSecondImagePath), public_path('storage/uploads/terrains/'.$secondfilename));

        $firstimage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/terrains/'.$firstfilename,
            'terrain_id' => $firstStadium->id
        ]);
        $secondImage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/terrains/'.$secondfilename,
            'terrain_id' => $firstStadium->id
        ]);

        for($i=1;$i<=7;$i++){
            $firstStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 10:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }

        $secondStadium = Terrain::Create([

            'name' => 'Terrains Multisports',
            'height' =>150,
            'length'=>100,
            'width'=>200,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>0,
            'video_recorder'=>1,
            'terrain_nature'=>'decouvert',
            'soil_type'=>'gazon',
            'complex_id' => $firstComplex->id,
            'sport_id' => $firstSpeciality->id,
            'category_id' =>  $firstCategory->id

        ]);

        $thirdtfilename = 'frontImage3'.$secondStadium->id.'.jpg';
        $fourtfilename = 'frontImage4'.$secondStadium->id.'.jpg';

        copy(public_path($frontThirdtPath), public_path('storage/uploads/terrains/'.$thirdtfilename));
        copy(public_path($fronFourtPath), public_path('storage/uploads/terrains/'.$fourtfilename));

        $thirdtImage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/terrains/'.$thirdtfilename,
            'terrain_id' => $secondStadium->id
        ]);
        $fourtImage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/terrains/'.$fourtfilename,
            'terrain_id' => $secondStadium->id
        ]);


        for($i=1;$i<=7;$i++){
            $secondStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 10:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }

        $thirdStadium = Terrain::Create([

            'name' => 'Terrains Futsal Hat Trick',
            'height' =>100,
            'length'=>200,
            'width'=>150,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>1,
            'video_recorder'=>0,
            'terrain_nature'=>'couvert',
            'soil_type'=>'gazon',
            'complex_id' => $firstComplex->id,
            'sport_id' => $firstSpeciality->id,
            'category_id' =>  $thirdCategory->id

        ]);

        $fifthfilename = 'frontImage5'.$thirdStadium->id.'.jpg';
        $sixtfilename = 'frontImage6'.$thirdStadium->id.'.jpg';

        copy(public_path($frontFifthPath), public_path('storage/uploads/terrains/'.$fifthfilename));
        copy(public_path($frontSixtPath), public_path('storage/uploads/terrains/'.$sixtfilename));
        $fifthImage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/terrains/'.$fifthfilename,
            'terrain_id' => $thirdStadium->id
        ]);
        $sixtImage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/terrains/'.$sixtfilename,
            'terrain_id' => $thirdStadium->id
        ]);


        for($i=1;$i<=7;$i++){
            $thirdStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }


        // ** //

        $fourthCategory = Category::Create([

            'title' => 'Espace Aquatique',

        ]);

        $fifthCategory = Category::Create([

            'title' => 'Espace Forme',

        ]);

        $sixthCategory = Category::Create([

            'title' => 'Espace Multisports',


        ]);

        $fourthStadium = Terrain::Create([

            'name' => 'Un bassin polyvalent de nage et d’activités',
            'height' =>100,
            'length'=>200,
            'width'=>150,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>1,
            'video_recorder'=>0,
            'terrain_nature'=>'couvert',
            'soil_type'=>'gazon',
            'complex_id' => $secondComplex->id,
            'sport_id' => $thirdSpeciality->id,
            'category_id' =>  $fourthCategory->id

        ]);


        for($i=1;$i<=7;$i++){
            $fourthStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 12:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }

        $fifthStadium = Terrain::Create([

            'name' => 'Un bassin ludique de détente et de loisirs',
            'height' =>100,
            'length'=>200,
            'width'=>150,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>1,
            'video_recorder'=>0,
            'terrain_nature'=>'couvert',
            'soil_type'=>'gazon',
            'complex_id' => $secondComplex->id,
            'sport_id' => $thirdSpeciality->id,
            'category_id' =>  $fourthCategory->id

        ]);

        for($i=1;$i<=7;$i++){
            $fifthStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }
        $sixthStadium = Terrain::Create([

            'name' => 'Salle cardio-training',
            'height' =>100,
            'length'=>200,
            'width'=>150,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>1,
            'video_recorder'=>0,
            'terrain_nature'=>'couvert',
            'soil_type'=>'gazon',
            'complex_id' => $secondComplex->id,
            'sport_id' => $fourthSpeciality->id,
            'category_id' =>  $fifthCategory->id

        ]);

        for($i=1;$i<=7;$i++){
            $sixthStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }

        $seventhStadium = Terrain::Create([

            'name' => 'une salle de gymnase',
            'height' =>100,
            'length'=>200,
            'width'=>150,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>1,
            'video_recorder'=>0,
            'terrain_nature'=>'couvert',
            'soil_type'=>'gazon',
            'complex_id' => $secondComplex->id,
            'sport_id' => $fourthSpeciality->id,
            'category_id' =>  $sixthCategory->id

        ]);

        for($i=1;$i<=7;$i++){
            $seventhStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
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
            'description' => 'NantesSport | votre Complex sports, fitness & piscine'
        ]);

        $thirdComplex = Complex::Create([

            'name' => 'NantesSport',
            'phone' => '0555586020' ,
            'email' => 'contact@NantesSport.com',
            'web_site' => 'http://NantesSport.fr/',
            'address_id' => $thirdAddress->id,
            'user_id' => 1

        ]);

        for($i=1;$i<=7;$i++){
            $thirdComplex->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 06:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }




        $seventhCategory = Category::Create([

            'title' => 'Fitness',


        ]);

        $eighthStadium = Terrain::Create([

            'name' => 'Terrains Football Nantes',
            'height' =>100,
            'length'=>200,
            'width'=>150,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>1,
            'video_recorder'=>0,
            'terrain_nature'=>'couvert',
            'soil_type'=>'gazon',
            'complex_id' => $thirdComplex->id,
            'sport_id' => $firstSpeciality->id,
            'category_id' =>  $seventhCategory->id

        ]);

        for($i=1;$i<=7;$i++){
            $eighthStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
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
            'description' => 'NantesSport | votre Complex sports, fitness & piscine'
        ]);

        $fourthComplex = Complex::Create([

            'name' => 'Nantes Erdre',
            'phone' => '0555586020' ,
            'email' => 'contact@NantesSport.com',
            'web_site' => 'http://NantesErdre.fr/',
            'address_id' => $fourthAddress->id,
            'user_id' => 1

        ]);

        for($i=1;$i<=7;$i++){
            $fourthComplex->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }



        $eighthCategory = Category::Create([

            'title' => 'Fitness',


        ]);

        $ninthStadium = Terrain::Create([

            'name' => 'Terrains Football Nantes Erdre',
            'height' =>100,
            'length'=>200,
            'width'=>150,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>1,
            'video_recorder'=>0,
            'terrain_nature'=>'couvert',
            'soil_type'=>'gazon',
            'complex_id' => $fourthComplex->id,
            'sport_id' => $firstSpeciality->id,
            'category_id' =>  $seventhCategory->id

        ]);

        for($i=1;$i<=7;$i++){
            $ninthStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 08:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
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
            'description' => 'BoranSport | votre Complex sports, fitness & piscine'
        ]);

        $fifthComplex = Complex::Create([

            'name' => 'BoranSport',
            'phone' => '0555586020' ,
            'email' => 'contact@NantesSport.com',
            'web_site' => 'http://NantesErdre.fr/',
            'address_id' => $fifthAddress->id,
            'user_id' => 1

        ]);

        for($i=1;$i<=7;$i++){
            $fifthComplex->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }




        $eighthCategory = Category::Create([

            'title' => 'Football',


        ]);

        $tenthStadium = Terrain::Create([

            'name' => 'Terrains Football BoranSport',
            'height' =>150,
            'length'=>100,
            'width'=>200,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>0,
            'video_recorder'=>1,
            'terrain_nature'=>'decouvert',
            'soil_type'=>'gazon',
            'complex_id' => $fifthComplex->id,
            'sport_id' => $firstSpeciality->id,
            'category_id' =>  $eighthCategory->id

        ]);

        for($i=1;$i<=7;$i++){
            $tenthStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
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
            'description' => 'BoranSport | votre Complex sports, fitness & piscine'
        ]);

        $sixthComplex = Complex::Create([

            'name' => 'SaintSport',
            'phone' => '0555586020' ,
            'email' => 'contact@SaintSport.com',
            'web_site' => 'http://NantesErdre.fr/',
            'address_id' => $sixthAddress->id,
            'user_id' => 1

        ]);

        for($i=1;$i<=7;$i++){
            $sixthComplex->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 11:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }




        $ninthCategory = Category::Create([

            'title' => 'Football',


        ]);

        $ninthStadium = Terrain::Create([

            'name' => 'Terrains Football SaintSport',
            'height' =>150,
            'length'=>100,
            'width'=>200,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                               Consequuntur fuga perspiciatis deserunt dolor vero reprehenderit facilis,
                               voluptate non, adipisci eveniet illo voluptatum eaque laboriosam consectetur.
                               Dignissimos, vitae? Recusandae, temporibus, perspiciatis?',
            'lighting'=>0,
            'video_recorder'=>1,
            'terrain_nature'=>'decouvert',
            'soil_type'=>'gazon',
            'complex_id' => $sixthComplex->id,
            'sport_id' => $secondSpeciality->id,
            'category_id' =>  $ninthCategory->id

        ]);

        for($i=1;$i<=7;$i++){
            $ninthStadium->schedules()->create([
                'start_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 8:00:00'),
                'ends_at' => Carbon::createFromFormat('Y-m-d H:i:s','2019-03-03 18:30:00'),
                'day' => $i
            ]);
        }






    }
}
