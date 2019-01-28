<?php

/**
 *	Reviews Helper
 */
function wishedTerrain($user,$id)
{

return  $user->wishlists->where('wished_id',$id)->where('wished_type','App\Modules\Infrastructures\Models\Terrain')->first();

}

function wishedClub($user,$club)
{

return  $user->wishlists->where('wished_id',$id)->where('wished_type','App\Modules\Infrastructures\Models\Club')->first();

}
