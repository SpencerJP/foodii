<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class QuestionsSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        factory(App\Models\Question::class, 10)->create()->each(function ($q) {

                factory(App\Models\Answer::class, 2)->create()->each(function ($a) use ($q) {
                $a->question_id = $q->id;
                $a->save();
                $tag = Tag::find(rand(1, Tag::All()->count()));
                $a->tags()->save($tag);
            });
        });
    }
}
