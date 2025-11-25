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
                'title' => 'The Dark Knight',
                'year' => 2008,
                'rating' => '9.0',
                'img' => 'https://ia.media-imdb.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg',
                'price' => 1600,
            ],
            [
                'title' => 'Interstellar',
                'year' => 2014,
                'rating' => '8.6',
                'img' => 'https://m.media-amazon.com/images/M/MV5BYzdjMDAxZGItMjI2My00ODA1LTlkNzItOWFjMDU5ZDJlYWY3XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg',
                'price' => 1700,
            ],
            [
                'title' => 'The Matrix',
                'year' => 1999,
                'rating' => '8.7',
                'img' => 'https://m.media-amazon.com/images/M/MV5BN2NmN2VhMTQtMDNiOS00NDlhLTliMjgtODE2ZTY0ODQyNDRhXkEyXkFqcGc@._V1_.jpg',
                'price' => 1500,
            ],
            [
                'title' => 'Gladiator',
                'year' => 2000,
                'rating' => '8.5',
                'img' => 'https://m.media-amazon.com/images/M/MV5BYWQ4YmNjYjEtOWE1Zi00Y2U4LWI4NTAtMTU0MjkxNWQ1ZmJiXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1400,
            ],
            [
                'title' => 'Titanic',
                'year' => 1997,
                'rating' => '7.9',
                'img' => 'https://m.media-amazon.com/images/M/MV5BYzYyN2FiZmUtYWYzMy00MzViLWJkZTMtOGY1ZjgzNWMwN2YxXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1300,
            ],
            [
                'title' => 'The Shawshank Redemption',
                'year' => 1994,
                'rating' => '9.3',
                'img' => 'https://m.media-amazon.com/images/M/MV5BMDAyY2FhYjctNDc5OS00MDNlLThiMGUtY2UxYWVkNGY2ZjljXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 2000,
            ],
            [
                'title' => 'Pulp Fiction',
                'year' => 1994,
                'rating' => '8.9',
                'img' => 'https://m.media-amazon.com/images/M/MV5BYTViYTE3ZGQtNDBlMC00ZTAyLTkyODMtZGRiZDg0MjA2YThkXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1500,
            ],
            [
                'title' => 'Fight Club',
                'year' => 1999,
                'rating' => '8.8',
                'img' => 'https://m.media-amazon.com/images/M/MV5BOTgyOGQ1NDItNGU3Ny00MjU3LTg2YWEtNmEyYjBiMjI1Y2M5XkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1500,
            ],
            [
                'title' => 'Forrest Gump',
                'year' => 1994,
                'rating' => '8.8',
                'img' => 'https://m.media-amazon.com/images/M/MV5BNDYwNzVjMTItZmU5YS00YjQ5LTljYjgtMjY2NDVmYWMyNWFmXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1400,
            ],
            [
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'year' => 2001,
                'rating' => '8.8',
                'img' => 'https://m.media-amazon.com/images/M/MV5BNzIxMDQ2YTctNDY4MC00ZTRhLTk4ODQtMTVlOWY4NTdiYmMwXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1800,
            ],
            [
                'title' => 'The Lord of the Rings: The Two Towers',
                'year' => 2002,
                'rating' => '8.7',
                'img' => 'https://m.media-amazon.com/images/M/MV5BMGQxMDdiOWUtYjc1Ni00YzM1LWE2NjMtZTg3Y2JkMjEzMTJjXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1800,
            ],
            [
                'title' => 'The Lord of the Rings: The Return of the King',
                'year' => 2003,
                'rating' => '8.9',
                'img' => 'https://m.media-amazon.com/images/M/MV5BMTZkMjBjNWMtZGI5OC00MGU0LTk4ZTItODg2NWM3NTVmNWQ4XkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 2000,
            ],
            [
                'title' => 'The Godfather',
                'year' => 1972,
                'rating' => '9.2',
                'img' => 'https://s3.amazonaws.com/nightjarprod/content/uploads/sites/249/2024/05/23161934/3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
                'price' => 1800,
            ],
            [
                'title' => 'The Godfather Part II',
                'year' => 1974,
                'rating' => '9.0',
                'img' => 'https://m.media-amazon.com/images/M/MV5BMDIxMzBlZDktZjMxNy00ZGI4LTgxNDEtYWRlNzRjMjJmOGQ1XkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1800,
            ],
            [
                'title' => 'The Godfather Part III',
                'year' => 1990,
                'rating' => '7.6',
                'img' => 'https://m.media-amazon.com/images/M/MV5BMDVjODgzNTEtNjBiNS00ODBjLWEwZjUtMDljZTFhOTA4M2MxXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1300,
            ],
            [
                'title' => 'The Green Mile',
                'year' => 1999,
                'rating' => '8.6',
                'img' => 'https://m.media-amazon.com/images/M/MV5BMTUxMzQyNjA5MF5BMl5BanBnXkFtZTYwOTU2NTY3._V1_SX300.jpg',
                'price' => 1600,
            ],
            [
                'title' => 'Saving Private Ryan',
                'year' => 1998,
                'rating' => '8.6',
                'img' => 'https://m.media-amazon.com/images/M/MV5BZGZhZGQ1ZWUtZTZjYS00MDJhLWFkYjctN2ZlYjE5NWYwZDM2XkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1700,
            ],
            [
                'title' => 'The Silence of the Lambs',
                'year' => 1991,
                'rating' => '8.6',
                'img' => 'https://m.media-amazon.com/images/M/MV5BNDdhOGJhYzctYzYwZC00YmI2LWI0MjctYjg4ODdlMDExYjBlXkEyXkFqcGc@._V1_SX300.jpg',
                'price' => 1400,
            ]
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
            [
                'title' => 'The Glass Orchard',
                'author' => 'Marin Solace',
                'year' => '2012',
                'rating' => '4.2',
                'img' => 'https://cdn.agapea.com/guy-roberts/The-Glass-Orchard-i1n26214277.jpg',
                'price' => 1899,
            ],
            [
                'title' => 'Midnight Atlas',
                'author' => 'E. K. Rowan',
                'year' => '2018',
                'rating' => '4.7',
                'img' => 'https://m.media-amazon.com/images/I/61hnoXcfUCL._UF1000,1000_QL80_.jpg',
                'price' => 2200,
            ],
            [
                'title' => 'Paper Lanterns',
                'author' => 'S. I. Natsume',
                'year' => '1999',
                'rating' => '3.9',
                'img' => 'https://i0.wp.com/paperlanternslit.com/wp-content/uploads/2023/11/PL13-front-cover.jpg?fit=1795%2C2480&ssl=1',
                'price' => 1250,
            ],
            [
                'title' => 'Clockwork Harbor',
                'author' => 'Delia Voss',
                'year' => '2005',
                'rating' => '4.1',
                'img' => 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781616143602/curious-case-of-the-clockwork-man-9781616143602.jpg',
                'price' => 1725,
            ],
            [
                'title' => 'Echoes of the Orchard',
                'author' => 'H. R. Lumen',
                'year' => '2021',
                'rating' => '4.8',
                'img' => 'https://m.media-amazon.com/images/I/91hmBV1M5vL._UF1000,1000_QL80_.jpg',
                'price' => 2499,
            ],
            [
                'title' => 'River & Rune',
                'author' => 'K. M. Ortega',
                'year' => '2016',
                'rating' => '4.3',
                'img' => 'https://m.media-amazon.com/images/I/71fr7N9d6pL._AC_UF1000,1000_QL80_.jpg',
                'price' => 1599,
            ],
            [
                'title' => 'Small Stars, Big Sky',
                'author' => 'Anna-Kate Bloom',
                'year' => '2010',
                'rating' => '4.0',
                'img' => 'https://usborne.com/media/catalog/product/cache/9f57ca01847aefa998664c052a98881a/9/7/9781801318235_cover_image.jpg',
                'price' => 1399,
            ],
            [
                'title' => 'The Last Cartographer',
                'author' => 'T. J. Evers',
                'year' => '2003',
                'rating' => '3.8',
                'img' => 'https://m.media-amazon.com/images/I/814VtFOxBgL._AC_UF1000,1000_QL80_.jpg',
                'price' => 1450,
            ],
            [
                'title' => 'Neon Orchard',
                'author' => 'R. Q. Hale',
                'year' => '2022',
                'rating' => '4.6',
                'img' => 'https://pbs.twimg.com/media/G39Xl01WMAAtxEv.jpg',
                'price' => 2799,
            ],

        ]);
    }
}
