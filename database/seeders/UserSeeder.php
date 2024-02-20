<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $newUser = new User();
            $newUser->name = 'Admin';
            $newUser->email = 'admin@a';
            $newUser->email_verified_at = $faker->time();
            $newUser->password = Hash::make('123');
            $newUser->save();

        for ($i=0; $i < 10; $i++) {
            $newUser = new User();
            $newUser->name = $faker->unique()->name();
            $newUser->email = $faker->unique()->email();
            $newUser->email_verified_at = $faker->time();
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
        }

    }
}