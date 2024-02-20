<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $userIds = User::all()->pluck('id');

        foreach( $userIds as $userId){
            $userDetail = new UserDetail();
            $userDetail->user_id = $userId;
            $userDetail->bio = $faker->unique()->realText();
            $userDetail->address = $faker->unique()->address();
            $userDetail->phone_number = $faker->unique()->phoneNumber();
            $userDetail->website = $faker->unique()->url();
            $userDetail->birth_year = $faker->year();
            $userDetail->save();
        }
    }
}