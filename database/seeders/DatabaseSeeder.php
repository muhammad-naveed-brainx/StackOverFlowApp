<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *public function run()
    {
    Question::truncate();
    Answer::truncate();

    // \App\Models\User::factory(10)->create();


    $question = Question::create([
    'title'=>'this is question 1 title from seeder',
    'body' => 'this is question body from seeder',
    'vote' => 1,
    'created_at' => now(),
    'updated_at' => now()

    ]);

    Answer::create([
    'body' => 'lorem epsum body',
    'vote' => 1,
    'question_id' => $question->id,
    'created_at' => now(),
    'updated_at' => now()

    ]);

    }
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
