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
        // DB::table('users')->delete();

        // // User with ID 2 is following user with ID 1
        // Follower::create(array(
        //     'user_id'     => '2',
        //     'follow_id' => '1',
        // ));
	}

}
