<?php

/**
 *	Complex Helper
 */
use App\Modules\Infrastructure\Models\Team;

 function getTeams($club_id,$speciality_id,$speciality)
 {
   $equipe[] = Team::whereHas('club', function ($query){
                   $query->where('id',1);
             })
             ->whereHas('speciality', function ($query) use ($speciality){
                             $query->where('id',$speciality->id);
                       })->get();
  return $equipe;
 }
