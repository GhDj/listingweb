<?php

use Illuminate\Database\Seeder;

use App\Modules\Infrastructures\Models\Terrain;

use App\Modules\Infrastructures\Models\TerrainSpeciality;

use App\Modules\Infrastructures\Models\Club;

use App\Modules\Infrastructure\Models\Team;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $firstClub = Club::Create([
                        'name' => 'Club 1',
                         'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                           Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                           Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                          'terrain_id' => Terrain::find(1)->id
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
                             'level' => 'level 1',
                             'speciality_id' => TerrainSpeciality::find(1)->id,
                             'club_id' => $firstClub->id
           ]);

           $secondEquipe = Team::Create([
                             'name' => 'equipe 2',
                             'level' => 'level 2',
                             'speciality_id' => TerrainSpeciality::find(1)->id,
                             'club_id' => $firstClub->id
           ]);

           $thirdEquipe = Team::Create([
                             'name' => 'equipe 3',
                             'level' => 'level 2',
                             'speciality_id' => TerrainSpeciality::find(2)->id,
                             'club_id' => $firstClub->id
           ]);

           $fourthEquipe = Team::Create([
                             'name' => 'equipe 4',
                             'level' => 'level 1',
                             'speciality_id' => TerrainSpeciality::find(2)->id,
                             'club_id' => $secondClub->id
           ]);
    }
}
