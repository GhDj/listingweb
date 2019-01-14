<?php

use Illuminate\Database\Seeder;

use App\Modules\Infrastructures\Models\Equipment;

use App\Modules\Infrastructures\Models\Terrain;

use App\Modules\General\Models\Media;

use App\Modules\Infrastructures\Models\TerrainSpeciality;


class EquipementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $frontFirstImagePath = 'img/e1.jpg';
      $firstEquipement =  Equipment::Create([
            'name' => 'Stadion Antona Malatinskeho',
            'description' => 'Stadion Antona Malatinskeho, also known as City Arena Trnava, is the recently opened new home of Spartak Trnava. The new arena got built in place of Spartak’s old home with the same name.
                              Demolition works on the old stadium started in Match 2013, but one stand was kept standing during the 2013-14 season so that Spartak could keep playing their home games at the ground.
                              Stadion Antona Malatinskeho officially opened on 22 August 2015 with a friendly between Spartak Trnava and Brazilian side Atletico Paranaense.
                              In the years following the opening of the stadium, it became a frequent playing venue for games of the Slovakian national team.',
            'status' => 'Ouvert',
            'hauteur' => 100,
            'longueur' => 100,
            'largueur' => 200,
            'speciality_id' => TerrainSpeciality::find(1)->id,
            'terrain_id' => Terrain::find(1)->id
        ]);
        $firstFilename = 'frontImage2'.$firstEquipement->id.'.jpg';

        copy(public_path($frontFirstImagePath), public_path('storage/uploads/equipements/'.$firstFilename));

        $firstimage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/equipements/'.$firstFilename,
            'equipment_id' => $firstEquipement->id
        ]);


        $frontSecondImagePath = 'img/e2.jpg';
        $secondEquipement =  Equipment::Create([
              'name' => 'Stade de la Licorne',
              'description' => 'Stade de la Licorne officially opened on 24 July 1999 with the French Super Cup match between Nantes and Bordeaux (1-0), though Johnny Hallyday had already given an inauguration concert a few weeks earlier.
              Stade de la Licorne replaced Amiens’ old Stade Moulonguet, which had fallen into a state of disrepair, and these days hosts the Amiens reserve team. It became once more the home of Amiens in 2016 when Stade de la Licorne was unavailable due to repair works on the glass roof.
              The capacity of the stadium could easily be expanded to 20,000 seats if Amiens were to achieve promotion to Ligue 1.
              Lens made the stadium their home during the 2014-15 season while their Stade Bollaert Delelis got redeveloped for the Euros 2016.',
              'status' => 'Ouvert',
              'hauteur' => 100,
              'longueur' => 100,
              'speciality_id' => TerrainSpeciality::find(1)->id,
              'largueur' => 200,
              'terrain_id' => Terrain::find(2)->id
          ]);
          $secondFilename = 'frontImage2'.$secondEquipement->id.'.jpg';

          copy(public_path($frontSecondImagePath), public_path('storage/uploads/equipements/'.$secondFilename));

          $firstimage = Media::create([
              'type' => '21',
              'link' => 'storage/uploads/equipements/'.$secondFilename,
              'equipment_id' => $secondEquipement->id
          ]);

          $frontThirdImagePath = 'img/e3.jpg';
          $thirdEquipement =  Equipment::Create([
                'name' => 'Halle Jean-Cochet',
                'description' => 'nauguré en 1991, la Halle Jean-Cochet possède initialement une capacité de 1 200 places1.
                                  En 2015, lorsque le Chartres Métropole Handball 28 monte en première division nationale, la ville doit faire face au cahier des charges de la LNH1. Avec un investissement de près de 530 000 € dans sa salle à l’intersaison, la ville met en place un nouvel éclairage,
                                  faisant passer l’exposition du sol de 800 à 1 200 lux. La sonorisation est également modernisée. La capacité de la salle reste identique mais le nombre de places assises passe de 760 à 1 010, la tribune mobile étant remplacée. Enfin, des panneaux LED font leur apparition autour du terrain et remplacent les anciens panneaux publicitaires2. Avant chaque match, une équipe recouvre en pleine nuit le parquet vitrifié, aux multiples tracés, du revêtement caoutchouteux bleu, préconisé par la LNH3.',
                'status' => 'Ouvert',
                'hauteur' => 100,
                'longueur' => 100,
                'speciality_id' => TerrainSpeciality::find(2)->id,
                'largueur' => 200,
                'terrain_id' => Terrain::find(2)->id
            ]);
            $thirdFilename = 'frontImage2'.$thirdEquipement->id.'.jpg';

            copy(public_path($frontThirdImagePath), public_path('storage/uploads/equipements/'.$thirdFilename));

            $firstimage = Media::create([
                'type' => '21',
                'link' => 'storage/uploads/equipements/'.$thirdFilename,
                'equipment_id' => $thirdEquipement->id
            ]);
    }
}
