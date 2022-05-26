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
        //create 6 users
        User::factory(6)->create();
        //create 1 user manually
        $user = User::create( ['name'=>'naveed', 'email'=>'abc@gmail.com', 'password'=>bcrypt('123')]
        );

        //create 5 answers and 5 new corresponding questions
        Answer::factory(5)->create([
            'user_id'=>$user->id,
        ]);

        //create one question and 5 answers related to this one question
        $question = Question::factory()->create();
        Answer::factory(5)->create([
            'question_id' => $question->id,
            'user_id' => $user->id,
        ]);

    }

}
