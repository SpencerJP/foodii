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
    {    /*
        factory(App\Models\Question::class, 10)->create()->each(function ($q) {

                factory(App\Models\Answer::class, 2)->create()->each(function ($a) use ($q) {
                $a->question_id = $q->id;
                $a->save();
                $tag = Tag::find(rand(1, Tag::All()->count()));
                $a->tags()->save($tag);
            });
        }); */
        $this->question("What time of day meal are you looking for?", [$this->answer("Breakfast", ["Breakfast"]), $this->answer("Lunch", ["Lunch"]), $this->answer("Dinner", ["Dinner"])]);
        $this->question("What type of 'eater' are you?", [$this->answer("Bottomless Pit", ["Large"]), $this->answer("Average Eater", ["Medium"]), $this->answer("Light Eater", ["Small"])]);
        $this->question("What are you craving right now?", [$this->answer()]);

    }

    public function question($questionvalue, array $answers) {
      $question = new Question;
      $question->questionvalue = $questionvalue;
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
        $id = $this->getTagId($value);
        $answer->tags()->attach($id);
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
}
