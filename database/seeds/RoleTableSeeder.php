<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_role=new Role();
        $user_role->name ='User';
        $user_role->description='Normal user';
        $user_role->save();

        $user_role=new Role();
        $user_role->name ='Admin';
        $user_role->description='Administrator';
        $user_role->save();
    }
}
