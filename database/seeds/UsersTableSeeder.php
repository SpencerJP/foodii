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

        $i = 1;
        $restaurantCount = App\Models\Restaurant::All()->count();

        //  test users for us to use
        $restaurantowner = new App\Models\User;
        $restaurantowner->name = "TestRO";
        $restaurantowner->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
        $restaurantowner->email = "testro@example.com";
        $restaurantowner->email_verified_at = now();
        $restaurantowner->user_type = "restaurant_owner";
        $restaurantowner->save();
        $j = 0;
        while($j != 5) {
          if($i != $restaurantCount) {
            $restaurant = App\Models\Restaurant::find($i);
            $restaurant->user_id = $restaurantowner->id;
            $restaurant->save();
            $i++;
          }
          $j++;
        }

        $admin = new App\Models\User;
        $admin->name = "TestAdmin";
        $admin->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
        $admin->email = "testadmin@example.com";
        $admin->email_verified_at = now();
        $admin->user_type = "admin";
        $admin->save();

        $customer = new App\Models\User;
        $customer->name = "TestCustomer";
        $customer->password = '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'; // secret
        $customer->email = "testcustomer@example.com";

        $customer->email_verified_at = now();
        $customer->user_type = "customer";
        $customer->save();




    	// generic random users
        factory(App\Models\User::class, 50)->create()->each(function ($u) use ($i) {
	        //$u->posts()->save(factory(App\Post::class)->make());
	        	// convert to a factory also
        	// 2 random restaurants
          /*
        	factory(App\Models\Restaurant::class, 2)->create()->each(function ($r) use ($u) {
        		$r->user_id = $u->id;
        		$r->save();
        	}); */


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
      foreach(App\Models\User::All() as $key => $value) {
        if($key < 4) {
          continue;
        }

        if($i != App\Models\Restaurant::All()->count()) {
          $restaurant = App\Models\Restaurant::find($i);
          $restaurant->user_id = $key;
          $restaurant->save();
          $i++;
        }
        if($i != App\Models\Restaurant::All()->count()) {
          $restaurant = App\Models\Restaurant::find($i);
          $restaurant->user_id = $key;
          $restaurant->save();
          $i++;
        }
      }


    }
}
