<?php

use App\Models\Role;
use App\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $librarian = Role::where('slug', 'librarian')->first();
        $user = Role::where('slug', 'user')->first();
        $user1 = new User();
        $user1->name = 'Admin';
        $user1->email = 'admin@mail.ru';
        $user1->password = Hash::make(12345678);
        $user1->save();
        $user1->roles()->attach($admin);
        $user2 = new User();
        $user2->name = 'Librarian';
        $user2->email = 'lib@mail.com';
        $user2->password = Hash::make(12345678);
        $user2->save();
        $user2->roles()->attach($librarian);
        $user2 = new User();
        $user2->name = 'Sasha';
        $user2->email = 'sasha@mail.com';
        $user2->password = Hash::make(12345678);
        $user2->save();
        $user2->roles()->attach($user);
    }
}
