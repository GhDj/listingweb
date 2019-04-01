<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ComplexSeeder::class);
        $this->call(ClubSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
