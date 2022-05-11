<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /*
     * Seed the application's database.
     *
     */


    public function run()
    {
        Answer::factory(5)->create(); //create 5 answers and 5 new corresponding questions

        //create one question and 5 answers related to this one question
        $question = Question::factory()->create();
        Answer::factory(5)->create([
            'question_id' => $question->id
        ]);

    }

}
