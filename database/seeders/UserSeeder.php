<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dummyData = [
            [
                'email' => 'admin@adm.com',
                'name' => 'admin',
                'password' => Hash::make('admin'),
                'role_id' => '1'
            ],
        ];
        foreach ($dummyData as $user) {
            User::create($user);
        }
        // \App\Models\User::factory()->create(
        //     [
        //         'email' => 'admin@adm.com',
        //         'name' => 'admin',
        //         'password' => Hash::make('admin'),
        //         'role_id' => '1'
        //     ]
        // );
    }
}
