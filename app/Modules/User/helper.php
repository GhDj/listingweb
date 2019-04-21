<?php

/**
 *	User Helper
 */
if (!function_exists('checkAdministratorRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkAdministratorRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id == 1) {
                return true;
            }
        }
        return false;
    }
}
if (!function_exists('checkPrivateComplexRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkPrivateComplexRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 2) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('userHasRequest')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function userHasRequest($user)
    {
        return ($user->complexRequest) ? true : false;
    }
}

if (!function_exists('isRequestAccepted')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function isRequestAccepted($user)
    {
        return ($user->complexRequestAccepted) ? true : false;
    }
}

if(!function_exists('checkPublicComplexRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkPublicComplexRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 3) {
                return true;
            }
        }
        return false;
    }
}

if(!function_exists('checkClubRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkClubRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 4) {
                return true;
            }
        }
        return false;
    }
}


if(!function_exists('checkAthleticRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkAthleticRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 5) {
                return true;
            }
        }
        return false;
    }
}

if(!function_exists('checkUserHasPublicComplex')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkUserHasPublicComplex($user)
    {
       return ($user->complex) ?  true :  false;

    }
}
