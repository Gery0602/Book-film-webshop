<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$12$vm14lCNOn8JgcCVg7t81qOEFoLGYaPabul6uGlTOHGxv6wO9.64H6',
            'phone' => '06300000000',
            'address' => 'Pozsonyi út 8',
            'city' => 'Eger',
            'post_code' => '3300',
            'country' => 'Magyarország',
            'remember_token' => 'H4cjNN5Sfd4LuJZZL2IzNvJX41qas9Y3HTCfK6gbaOelmcUaU4EMvyRzewG3',
            'role' => 'user'
            ],
        ]);


        DB::table('movies')->insert([
            [
                'title' => 'Avatar',
                'year' => '2009',
                'rating' => '7.9',
                'img' => 'https://ia.media-imdb.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SX300.jpg',
                'price' => 1500,

            ],
            [
                'title' => 'I am Legend',
                'year' => '2007',
                'rating' => '7.2',
                'img' => 'https://m.media-amazon.com/images/M/MV5BMGE1OWZkZmItNmVhMC00YzAxLTgxOTctNjg3NWExM2RmOWJkXkEyXkFqcGc@._V1_.jpg',
                'price' => 1500,
            ],
            [
                'title' => '300',
                'year' => '2006',
                'rating' => '7.7',
                'img' => 'https://ia.media-imdb.com/images/M/MV5BMjAzNTkzNjcxNl5BMl5BanBnXkFtZTYwNDA4NjE3._V1_SX300.jpg',
                'price' => 1500,
            ],
            [
                'title' => 'Interstellar',
                'year' => '2014',
                'rating' => '8.6',
                'img' => 'https://ia.media-imdb.com/images/M/MV5BMjIxNTU4MzY4MF5BMl5BanBnXkFtZTgwMzM4ODI3MjE@._V1_SX300.jpg',
                'price' => 1500,
            ],
        ]);

        DB::table('books')->insert([
            [
                'title' => 'Hagakure',
                'author' => 'Jamamoto Cunetomo',
                'year' => '2000',
                'rating' => '4.5',
                'img' => 'https://lira.erbacdn.net/upload/M_28/rek1/541/4314541.jpg',
                'price' => 1500,
            ],
            [
                'title' => 'Az öt elem könyve',
                'author' => 'Mijamoto Muszasi',
                'year' => '1645',
                'rating' => '5',
                'img' => 'https://s01.static.libri.hu/cover/78/f/4412985_4.jpg',
                'price' => 1500,
            ],
            
        ]);
    }
}
