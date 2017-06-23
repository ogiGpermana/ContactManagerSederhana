<?php

use Illuminate\Database\Seeder;
use ContactManager\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Ogi G Permana";
        $user->email = "ogigpermana@gmail.com";
        $user->password = bcrypt("secret");
        $user->save();
    }
}
