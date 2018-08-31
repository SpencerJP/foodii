<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	// generic random users
        factory(App\Models\User::class, 50)->create()->each(function ($u) {
	        //$u->posts()->save(factory(App\Post::class)->make());
	        	// convert to a factory also
        	// 2 random restaurants
        	factory(App\Models\Restaurant::class, 2)->create()->each(function ($r) use ($u) {
        		$r->user_id = $u->id;
        		$r->save();
        	});

	        $preferences = new App\Models\Preferences;
	        $preferences->dietary_mode = "None";
	        $preferences->preferred_price_range = "None";
	        $preferences->preferred_radius_size = "None";
	        $preferences->save();

	        $u->preference_id = $preferences->id;
	        $u->save();
	        $preferences->user_id = $u->id;
	        $preferences->save();
    	});

    	//  test users for us to use

    	$restaurantowner = new App\Models\User;
    	$restaurantowner->name = "TestRO";
    	$restaurantowner->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
    	$restaurantowner->email = "testro@example.com";
    	$restaurantowner->user_type = "restaurant_owner";
    	$restaurantowner->save();
    	factory(App\Models\Restaurant::class, 5)->create()->each(function ($r) use ($restaurantowner) {
        		$r->user_id = $restaurantowner->id;
        		$r->save();
        	});

    	$admin = new App\Models\User;
    	$admin->name = "TestAdmin";
    	$admin->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
    	$admin->email = "testadmin@example.com";
    	$admin->user_type = "admin";
    	$admin->save();

    	$customer = new App\Models\User;
    	$customer->name = "TestCustomer";
    	$customer->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
    	$customer->email = "testcustomer@example.com";
    	$customer->user_type = "customer";
    	$customer->save();
        /* TODO */
    }
}
