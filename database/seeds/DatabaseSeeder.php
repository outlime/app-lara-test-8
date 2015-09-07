<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Follower;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');

		// Empty all previous records out
        DB::table('followers')->delete();

        // User with ID 2 is following user with ID 1
        Follower::create(array(
            'user_id'     => '2',
            'follow_id' => '1',
        ));

        // User with ID 3 is following user with ID 1
        Follower::create(array(
            'user_id'     => '3',
            'follow_id' => '1',
        ));

        // // User with ID 1 is following user with ID 4
        // Follower::create(array(
        //     'user_id'     => '1',
        //     'follow_id' => '4',
        // ));

        // // User with ID 1 is following user with ID 5
        // Follower::create(array(
        //     'user_id'     => '1',
        //     'follow_id' => '5',
        // ));
	}

}
