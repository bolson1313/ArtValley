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
        User::insert(
            [
                [
                    'name' => 'Jan',
                    'surname' => 'May',
                    'nickname' => 'jan12',
                    'avatar' => 'avatar1.png',
                    'email' => 'jan@email.com',
                    'password' => Hash::make('password'),
                    'role' => 'user',
                ],
                [
                    'name' => 'Adam',
                    'surname' => 'Zet',
                    'nickname' => 'zet1222',
                    'avatar' => 'avatar2.png',
                    'email' => 'a.zet@example.com',
                    'password' => Hash::make('password'),
                    'role' => 'user',
                ],
                [
                    'name' => 'Kacper',
                    'surname' => 'Bułaś',
                    'nickname' => 'boolson',
                    'avatar' => 'avatar7.jpg',
                    'email' => 'kb2137@email.com',
                    'password' => Hash::make('password'),
                    'role' => 'admin',
                ],
                [
                    'name' => 'Karol',
                    'surname' => 'Dąbrowski',
                    'nickname' => 'karold',
                    'avatar' => 'avatar3.jpg',
                    'email' => 'karol@email.com',
                    'password' => Hash::make('password'),
                    'role' => 'user',
                ],
                [
                    'name' => 'Gregory',
                    'surname' => 'Montana',
                    'nickname' => 'montana69',
                    'avatar' => 'avatar4.png',
                    'email' => 'montana.G@email.com',
                    'password' => Hash::make('password'),
                    'role' => 'user',
                ],
                [
                    'name' => 'Maya',
                    'surname' => 'Emano',
                    'nickname' => 'mayem1',
                    'avatar' => 'avatar5.png',
                    'email' => 'mayem12@email.com',
                    'password' => Hash::make('password'),
                    'role' => 'user',
                ],
                [
                    'name' => 'Emiliano',
                    'surname' => 'Kolano',
                    'nickname' => 'kolanoemiliano',
                    'avatar' => 'avatar6.jpg',
                    'email' => 'emiliok@email.com',
                    'password' => Hash::make('password'),
                    'role' => 'user',
                ]
            ]
        );
    }
}
