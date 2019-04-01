<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'Admin',
        ]);
        Role::create([
            'title' => 'Responsable complexe prive',
        ]);
        Role::create([
            'title' => 'Responsable complexe public ',
        ]);
        Role::create([
            'title' => 'Responsable club',
        ]);

        Role::create([
            'title' => 'Sportif',
        ]);

        Role::create([
            'title' => 'Sous Administrateur',
        ]);
    }
}
