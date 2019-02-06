<?php

use Illuminate\Database\Seeder;

use App\Modules\Infrastructures\Models\Terrain;

use App\Modules\Infrastructures\Models\TerrainSpeciality;

use App\Modules\Infrastructures\Models\Club;

use App\Modules\Infrastructure\Models\Team;

use App\Modules\General\Models\Media;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $frontFirstImagePath = 'img/1.jpg';
          $frontSecondImagePath = 'img/2.jpg';
          $frontThirdtPath = 'img/3.jpg';
          $fronFourtPath = 'img/4.jpg';
          $frontFifthPath = 'img/5.jpg';
          $frontSixtPath = 'img/6.jpg';
          $firstClub = Club::Create([
                        'name' => 'Club 1',
                         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                           Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                           Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                          'terrain_id' => Terrain::find(1)->id
                        ]);

        $firstFilename = 'frontImage1'.$firstClub->id.'.jpg';
        copy(public_path($frontFirstImagePath), public_path('storage/uploads/clubs/'.$firstFilename));
        $firstimage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/clubs/'.$firstFilename,
            'club_id' => $firstClub->id
        ]);

        $secondFilename = 'frontImage2'.$firstClub->id.'.jpg';
        copy(public_path($frontSecondImagePath), public_path('storage/uploads/clubs/'.$secondFilename));
        $firstimage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/clubs/'.$secondFilename,
            'club_id' => $firstClub->id
        ]);

        $thirdFilename = 'frontImage3'.$firstClub->id.'.jpg';
        copy(public_path($frontThirdtPath), public_path('storage/uploads/clubs/'.$thirdFilename));
        $firstimage = Media::create([
            'type' => '21',
            'link' => 'storage/uploads/clubs/'.$thirdFilename,
            'club_id' => $firstClub->id
        ]);
          $secondClub = Club::Create([
                        'name' => 'Club 2',
                         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                           Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                           Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                          'terrain_id' => Terrain::find(1)->id
                        ]);

          $thirdClub = Club::Create([
                        'name' => 'Club 3',
                         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                             sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                             Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                             Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                          'terrain_id' => Terrain::find(1)->id
                          ]);
          $fourthClub = Club::Create([
                        'name' => 'Club 4',
                         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                             sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                             Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                             Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                          'terrain_id' => Terrain::find(2)->id
                          ]);
           $firstEquipe = Team::Create([
                             'name' => 'equipe 1',
                             'level' => '1',
                             'speciality_id' => TerrainSpeciality::find(1)->id,
                             'club_id' => $firstClub->id
           ]);

           $secondEquipe = Team::Create([
                             'name' => 'equipe 2',
                             'level' => '2',
                             'speciality_id' => TerrainSpeciality::find(1)->id,
                             'club_id' => $firstClub->id
           ]);

           $thirdEquipe = Team::Create([
                             'name' => 'equipe 3',
                             'level' => '3',
                             'speciality_id' => TerrainSpeciality::find(2)->id,
                             'club_id' => $firstClub->id
           ]);


            $fourthFilename = 'frontImage2'.$firstEquipe->id.'.jpg';
           copy(public_path($fronFourtPath), public_path('storage/uploads/teams/'.$fourthFilename));
           $firstimage = Media::create([
               'type' => '21',
               'link' => 'storage/uploads/teams/'.$fourthFilename,
               'team_id' => $firstEquipe->id
           ]);

           $FifthFilename = 'frontImage2'.$secondEquipe->id.'.jpg';
           copy(public_path($frontFifthPath), public_path('storage/uploads/teams/'.$FifthFilename));
           $firstimage = Media::create([
               'type' => '21',
               'link' => 'storage/uploads/teams/'.$FifthFilename,
               'team_id' => $secondEquipe->id
           ]);

           $SixtFilename = 'frontImage2'.$thirdEquipe->id.'.jpg';
           copy(public_path($frontSixtPath), public_path('storage/uploads/teams/'.$SixtFilename));
           $firstimage = Media::create([
               'type' => '21',
               'link' => 'storage/uploads/teams/'.$SixtFilename,
               'team_id' => $thirdEquipe->id
           ]);

           $fourthEquipe = Team::Create([
                             'name' => 'equipe 4',
                             'level' => 'level 1',
                             'speciality_id' => TerrainSpeciality::find(2)->id,
                             'club_id' => $secondClub->id
           ]);
    }
}
