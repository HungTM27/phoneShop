<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userDate = [
            [
                'name' => 'hungtm',
                'email' => 'hungtm32@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => '1',
            ],
        ];

        foreach ($userDate as $user) { 
            $users = new User();
            $users->fill($user);
            $users->save();
        }
    }
}
