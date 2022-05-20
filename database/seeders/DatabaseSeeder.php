<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /*
     * Seed the application's database.
     *
     */


    public function run()
    {
        //create 5 answers and 5 new corresponding questions
        Answer::factory(5)->create();

        //create one question and 5 answers related to this one question
        $question = Question::factory()->create();
        Answer::factory(5)->create([
            'question_id' => $question->id
        ]);

        //create 5 users
        User::factory(5)->create();
        //create 1 user manually
        User::create( ['name'=>'naveed', 'email'=>'abc@gmail.com', 'password'=>bcrypt('123')]
        );

    }

}
