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
        factory(App\Models\User::class, 50)->create()->each(function ($u) {
        //$u->posts()->save(factory(App\Post::class)->make());
        	// convert to a factory also
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
    }
}
