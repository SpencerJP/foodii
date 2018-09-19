<?php

use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Tag;
class GoogleApiRestaurants extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      $googleApiText = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-37.809576,%20144.963824&radius=2000&type=restaurant&key=AIzaSyAu4UB853iuG3cXpVBC27kzmfV6vkzVRFQ");
      $json = json_decode($googleApiText, true);
      $nextPageToken = $json['next_page_token'];

      // make sure the tags are always the same by seeding with my birth year (easier testing if they're the same)
      mt_srand(1996);

      foreach($json['results'] as $key => $value) {
        $restaurant = new Restaurant;
        $restaurant->name = $value["name"];
        $restaurant->address = $value["vicinity"];
        $restaurant->longitude = floatval($value["geometry"]["location"]["lng"]);
        $restaurant->latitude = floatval($value["geometry"]["location"]["lat"]);
        $restaurant->description = $faker->text;
        $restaurant->rating = 0;
        if (array_key_exists("price_level", $value) ) { // google doesn't always have a price level
          $restaurant->price_range_identifier = $value["price_level"];
        }
        else {
            $restaurant->price_range_identifier = 1;
        }
        $amountOfTags = rand(1,3);
        $restaurant->save();
        for($y = 0; $y < $amountOfTags; $y++) {
          $randomTag = Tag::all()->random(1);
          $id = $randomTag->first()->id;
          if(!$restaurant->tags()->get()->contains($id)) {
            $restaurant->tags()->attach($randomTag);
          }
        }
        $restaurant->save();

      }

      /*
      for($x = 1;$x < 5; $x++) {
        sleep(2); // nextPage only valid after certain period of time to prevent ddos
        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-37.809576,%20144.963824&radius=2000&type=restaurant&key=AIzaSyAu4UB853iuG3cXpVBC27kzmfV6vkzVRFQ&pagetoken=" . urlencode($nextPageToken);
        $googleApiTextWithNextToken = file_get_contents($url);
        $newjson = json_decode($googleApiTextWithNextToken, true);
        foreach($newjson['results'] as $key => $value) {
            $restaurant = new Restaurant;
            $restaurant->name = $value["name"];
            $restaurant->address = $value["vicinity"];
            $restaurant->longitude = floatval($value["geometry"]["location"]["lng"]);
            $restaurant->latitude = floatval($value["geometry"]["location"]["lat"]);
            $restaurant->description = $faker->text;
            $restaurant->rating = 0;
            if (array_key_exists("price_level", $value) ) { // google doesn't always have a price level
                      $restaurant->price_range_identifier = $value["price_level"];
                    }
                    else {
                        $restaurant->price_range_identifier = 1;
                    }
            $amountOfTags = rand(1,3);
            $restaurant->save();
            for($y = 0; $y < $amountOfTags; $y++) {
              $randomTag = Tag::all()->random(1);
              $id = $randomTag->first()->id;
              if(!$restaurant->tags()->get()->contains($id)) {
                $restaurant->tags()->attach($randomTag);
              }
            }
            $restaurant->save();

        }
        if (array_key_exists("next_page_token", $newjson) ) { // google doesn't always have a price level
          $nextPageToken = $newjson['next_page_token'];
        }
        else {
          break;
        }
      }
      */



    }
}
