<?php

use Illuminate\Database\Seeder;
use RS\User;

class UserSeeder extends Seeder
{
    public function run()
    {
    	User::create(array(
	        		'email' => 'userwang@email.com',
					'name' => 'user wang',
					'password' => bcrypt('ABC123abc'),
	        	));
    	User::create(array(
	        		'email' => 'usertoo@email.com',
					'name' => 'user too',
					'password' => bcrypt('ABC123abc'),
	        	));
        User::create(array(
	        		'email' => 'userthree@email.com',
					'name' => 'user three',
					'password' => bcrypt('ABC123abc'),
	        	));
    }
}
