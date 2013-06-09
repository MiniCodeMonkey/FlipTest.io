<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	User::create(array(
            'email' => 'me@codemonkey.io',
            'password' => Hash::make('fliptest')
        ));
    }

}