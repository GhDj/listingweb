<?php

/**
 *	Complex Helper
 */
use App\Modules\Infrastructure\Models\Team;

 function getTeams($club_id,$speciality_id,$speciality)
 {
   /*$equipe[] = Team::whereHas('club', function ($query){
                   $query->where('id',1);
             })
             ->whereHas('speciality', function ($query) use ($speciality){
                             $query->where('id',$speciality->id);
                       })->get();*/
     $equipe[] = Team::whereHas('club', function ($query,$club_id){
         $query->where('id','=',$club_id);
     })
         ->get();
   return $equipe;
 }
