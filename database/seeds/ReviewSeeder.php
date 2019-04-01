<?php

use Illuminate\Database\Seeder;

use App\Modules\Reviews\Models\Review;
use App\Modules\Complex\Models\Terrain;

use App\Modules\User\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Terrain::find(1)->reviews()->create([
          'note' =>  10 ,
          'comment' =>  'This Is my first Comment' ,
          'user_id' => 1,
        ]);

        Terrain::find(1)->reviews()->create([
          'note' =>  2 ,
          'comment' =>  'This Is my second Comment' ,
          'user_id' => 2,
        ]);

        Terrain::find(2)->reviews()->create([
          'note' =>  5 ,
          'comment' =>  'This Is my first Comment' ,
          'user_id' => 2,
        ]);

        Terrain::find(2)->reviews()->create([
          'note' =>  5 ,
          'comment' =>  'This Is my Second Comment' ,
          'user_id' => 1,
        ]);

        Terrain::find(3)->reviews()->create([
          'note' =>  5 ,
          'comment' =>  'This Is my Second Comment' ,
          'user_id' => 1,
        ]);

        Terrain::find(3)->reviews()->create([
          'note' =>  5 ,
          'comment' =>  'This Is my Second Comment' ,
          'user_id' => 2,
        ]);


    }
}
