<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Question;
use App\Models\Answer;

class QuestionsSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // if you want to make something a negative tag you can specify it as ["tagName", "negative"] instead of "tagName"
        $this->question(null, "What time of day meal are you looking for?", [$this->answer("Breakfast", ["Breakfast"]), $this->answer("Lunch", ["Lunch"]), $this->answer("Dinner", ["Dinner"])]);
        $this->question(null, "What type of 'eater' are you?", [$this->answer("Bottomless Pit", ["Large"]), $this->answer("Average Eater", ["Medium"]), $this->answer("Light Eater", ["Small"])]);
        $this->question(null, "What are you craving right now?", [$this->answer("Sweets and sugar", ["Sweet", "Dessert", "Sugar"]), $this->answer("Spicy, hot and wild", ["Spicy"]), $this->answer("After some veggies", ["Vegetarian"])]);
        $this->question(null, "Where would you prefer to eat?", [$this->answer("At a restaurant", ["Restaurant"]), $this->answer("At a pub", ["Pub"]), $this->answer("At home", ["Takeaway"])]);
        $this->question(null, "Are you a vegetarian?", [$this->answer("Yes", ["Vegetarian", ["Beef", "negative"], ["Chicken", "negative"], ["Fish", "negative"]]), $this->answer("No", [])]);
        $this->question(null, "What is your favourite utensil to eat with?", [$this->answer("Knife and fork", ["Steak", "Beef"]), $this->answer("A spoon", ["Soup", "Beef"]), $this->answer("Chopsticks", ["Asian", "Noodles", "Curry"]), $this->answer("My hands", ["Chicken", "Burgers", "Chips"]) ]);
    }

    public function question($weight = 5, $questionvalue, array $answers) {
      $question = new Question;
      $question->questionvalue = $questionvalue;
      $question->weight = $weight;
      $question->save();

      foreach($answers as $key => $value) {
        $value->question_id = $question->id;
        $value->save();
      }
      return $question;
    }

    public function answer($answervalue, array $tags) {
      $answer = new Answer;
      $answer->answervalue = $answervalue;
      $answer->save();

      foreach($tags as $key => $value) {
        if (is_string($value)) { // if you want to make something a negative tag you can specify it as ["tagName", "negative"] instead of "tagName"
          $id = $this->getTagId($value);
          $answer->tags()->attach($id);
        }
        else {
          $id = $this->getTagId($value[0], $value[1]);
          $answer->tags()->attach($id);
        }
      }

      return $answer;
    }

    public function getTagId($tagName) {
        $newTag = new Tag;
        $newTag->name = $tagName;
        $newTag->type = 'positive';

        $id = Tag::All()->search(function($value, $key) use ($tagName) {
            $value->name = $tagName;
        });
        if ($id == false) {
          $newTag->save();
          return $newTag->id;
        }
        else {
          return $id;
        }
    }

    public function getTagIdWithType($tagName, $type) {
        $newTag = new Tag;
        $newTag->name = $tagName;
        $newTag->type = $type;

        $id = Tag::All()->search(function($value, $key) use ($tagName) {
            $value->name = $tagName;
        });
        if ($id == false) {
          $newTag->save();
          return $newTag->id;
        }
        else {
          return $id;
        }
    }

    /*
       factory(App\Models\Question::class, 10)->create()->each(function ($q) {

               factory(App\Models\Answer::class, 2)->create()->each(function ($a) use ($q) {
               $a->question_id = $q->id;
               $a->save();
               $tag = Tag::find(rand(1, Tag::All()->count()));
               $a->tags()->save($tag);
           });
       }); */
}
