<?php

use Illuminate\Database\Seeder;

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
                factory(App\Models\Tag::class, 4)->create()->each(function ($t) use ($a) {
                    $t->answers()->save($a);
                    $a->tags()->save($t);
                });
                $a->save();
            });
        });
    }
}
