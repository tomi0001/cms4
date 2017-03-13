<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin=Role::where('name','Admin')->first();

        $user = new User();
        $user->name='SwateQ';
        $user->email='rafal.filek@hotmail.com';
        $user->password=bcrypt('test');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
