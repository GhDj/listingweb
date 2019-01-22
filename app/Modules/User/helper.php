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
if (!function_exists('checkProfessionnelRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkProfessionnelRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 2) {
                return true;
            }
        }
        return false;
    }
}
if(!function_exists('checkGestionnaireRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkGestionnaireRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 3) {
                return true;
            }
        }
        return false;
    }
}

if(!function_exists('checkInternauteRole')) {
    /**
     * @param \App\Modules\User\Models\User $user
     * @return bool
     */
    function checkInternauteRole($user)
    {
        foreach ($user->roles as $role) {
            if ($role->id === 4) {
                return true;
            }
        }
        return false;
    }
}
