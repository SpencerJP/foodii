<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    // feel free to add more fellas
	    $defaultTags = array("Vegetarian", "Vegan", "Gluten-Free", "Fish", "Beef", "Chicken", "Curry", "Spicy", "Hot", "Cold", "Dessert", "Italian", "Thai");
	    $arrlength = count($defaultTags);

		for($x = 0; $x < $arrlength; $x++) {
		    $tag = new App\Models\Tag;
		    $tag->name = $defaultTags[$x];
		    $tag->type = "positive";
		    $tag->save();
		}
    }
}
