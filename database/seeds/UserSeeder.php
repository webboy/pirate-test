<?php

use Illuminate\Database\Seeder;

use App\User;
use App\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// Add manager
        $user = new User();
        $user->name 	= 'John Smith';
        $user->email 	= 'manager@hr.com';
        $user->password = bycript('manager');
        $user->role_id 	= UserRole::MANAGER;

        $user->save();

        //Add moderator
        $user = new User();
        $user->name 	= 'Jane Doe';
        $user->email 	= 'moderator@hr.com';
        $user->password = bycript('moderator');
        $user->role_id 	= UserRole::MODERATOR;

        $user->save();
    }
}
