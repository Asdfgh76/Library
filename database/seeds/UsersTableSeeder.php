<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;

    class UsersTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            $data = [
                [
                    'id' => 1,
                    'login' => 'admin',
                    'email' => 'a@a.ru',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 2,
                    'login' => 'librarian',
                    'email' => 'u@u.ru',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 3,
                    'login' => 'sasha',
                    'email' => 'admin@admin.ru8',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 4,
                    'login' => 'masha',
                    'email' => 'admin@admin.ru9',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 5,
                    'login' => 'pasha',
                    'email' => 'admin@admin.ru10',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 6,
                    'login' => 'misha',
                    'email' => 'admin@admin.ru11',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 7,
                    'login' => 'dasha',
                    'email' => 'admin@admin.ru12',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 8,
                    'login' => 'olia',
                    'email' => 'admin@admin.ru13',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 9,
                    'login' => 'kolia',
                    'email' => 'admin@admin.ru14',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 10,
                    'login' => 'oleg',
                    'email' => 'admin@admin.ru15',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 11,
                    'login' => 'ira',
                    'email' => 'admin@admin.ru16',
                    'password' => bcrypt(12345678),
                ],
                [
                    'id' => 12,
                    'login' => 'nastia',
                    'email' => 'admin@admin.ru17',
                    'password' => bcrypt(12345678),
                ],
            ];
            DB::table('users')->insert($data);
        }

    }
