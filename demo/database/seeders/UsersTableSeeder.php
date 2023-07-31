<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users = [
        //     [
        //         'name' => 'John Doe',
        //         'email' => 'johndoe@example.com',
        //         'password' => Hash::make('password'),
        //     ],
        //     [
        //         'name' => 'Jane Doe',
        //         'email' => 'janedoe@example.com',
        //         'password' => Hash::make('password'),
        //     ],
        //     [
        //         'name' => 'Lisa',
        //         'email' => 'lisa@example.com',
        //         'password' => Hash::make('password'),
        //     ],
        //     [
        //         'name' => 'Rose',
        //         'email' => 'rose@example.com',
        //         'password' => Hash::make('password'),
        //     ],
        // ];

        //     DB::table('users')->insert($users);

            $faker =\Faker\Factory::create();

            $limit = 100;
    
            for ($i = 0; $i < $limit; $i++) {
                \App\Models\User::Create([
                    'name' => $faker->name,
                    'email' => $faker->email,
                    'password' =>bcrypt('12345'),
                ]);
            }
    }
}
