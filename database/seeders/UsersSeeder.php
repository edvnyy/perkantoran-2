<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Ibu Ratna',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345'),
            ],
            [
                'name' => 'Pak Bima',
                'email' => 'staf@gmail.com',
                'role' => 'staf',
                'password' => bcrypt('12345'),
            ],
        ];
        foreach($userData as $key => $val){
            User::create($val);
        }

    }
}
