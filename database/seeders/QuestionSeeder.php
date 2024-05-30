<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [];



        shuffle($questions);

        foreach ($questions as $questionData) {
            $question = Question::create(Arr::except($questionData, 'answers'));
            foreach ($questionData['answers'] as $answerData) {
                $answer = new Answer($answerData);
                $question->answers()->save($answer);
            }
        }
    }
}
