<?php

use Illuminate\Database\Seeder;

use App\Modules\User\Models\User;

use App\Modules\General\Models\Address;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $firstAddress = Address::Create([
        'city' => 'Paris' ,
        'postal_code' => '75007' ,
        'country' => 'france' ,
        'locality' => Null ,
        'address' => '75007 Paris, France' ,
        'latitude' => 48.855668,
        'longitude' => 2.319590 ,
        'description' => '75007 Paris, France'

      ]);
        $owner = User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Barhoumi',
            'email' => 'test@test.fr',
            'password' => bcrypt('123456'),
            'gender' => 1,
            'validation' => 1,
            'status' => 2,
            'phone' => Null,
            'promo_pts' => 10,
            'picture' => config('app.seed_path_img').'img\unknown.png',
            'address_id' => $firstAddress->id
        ]);

        $owner->roles()->attach(2);

        $manager = User::create([
          'first_name' => 'zac',
          'last_name' => 'zac',
          'email' => 'zac@test.fr',
          'password' => bcrypt('123456'),
          'gender' => 1,
          'validation' => 1,
          'status' => 2,
          'phone' => Null,
          'promo_pts' => 10,
          'picture' => config('app.seed_path_img').'img\unknown.png',
          'address_id' => $firstAddress->id
        ]);

        $manager->roles()->attach(3);

        $user = User::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Barhoumi',
            'email' => 'med@test.fr',
            'password' => bcrypt('123456'),
            'gender' => 1,
            'validation' => 1,
            'status' => 2,
            'phone' => Null,
            'promo_pts' => 10,
            'picture' => config('app.seed_path_img').'img\unknown.png',
            'address_id' => $firstAddress->id
        ]);

        $user->roles()->attach(4);


  }
}
