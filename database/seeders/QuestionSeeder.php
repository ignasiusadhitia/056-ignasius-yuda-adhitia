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


        for ($i = 0; $i < 10; $i++) {
            $questions[] = [
                'question_text' => "Question " . ($i + 1) . ": What is the capital of West Java?",
                'difficulty_level' => ($i % 3 == 0) ? 'easy' : 'medium',
                'category_id' => 1,
                'user_id' => 1,
                'image_url' => null,
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Bandung', 'is_correct' => true],
                    ['answer_text' => 'Jakarta', 'is_correct' => false],
                    ['answer_text' => 'Surabaya', 'is_correct' => false],
                    ['answer_text' => 'Semarang', 'is_correct' => false],
                ]
            ];
        }


        for ($i = 0; $i < 10; $i++) {
            $questions[] = [
                'question_text' => "Question " . ($i + 1) . ": When did the Dutch colonize West Java?",
                'difficulty_level' => ($i % 3 == 0) ? 'easy' : 'medium',
                'category_id' => 2,
                'user_id' => 1,
                'image_url' => null,
                'points' => 1,
                'answers' => [
                    ['answer_text' => '17th century', 'is_correct' => true],
                    ['answer_text' => '18th century', 'is_correct' => false],
                    ['answer_text' => '19th century', 'is_correct' => false],
                    ['answer_text' => '20th century', 'is_correct' => false],
                ]
            ];
        }


        for ($i = 0; $i < 10; $i++) {
            $questions[] = [
                'question_text' => "Question " . ($i + 1) . ": What traditional dance is famous in West Java?",
                'difficulty_level' => ($i % 3 == 0) ? 'easy' : 'medium',
                'category_id' => 3,
                'user_id' => 1,
                'image_url' => null,
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Jaipong', 'is_correct' => true],
                    ['answer_text' => 'Gamelan', 'is_correct' => false],
                    ['answer_text' => 'Kecak', 'is_correct' => false],
                    ['answer_text' => 'Reog Ponorogo', 'is_correct' => false],
                ]
            ];
        }


        for ($i = 0; $i < 10; $i++) {
            $questions[] = [
                'question_text' => "Question " . ($i + 1) . ": What animal is endemic to West Java?",
                'difficulty_level' => ($i % 3 == 0) ? 'easy' : 'medium',
                'category_id' => 4,
                'user_id' => 1,
                'image_url' => null,
                'points' => 1,
                'answers' => [
                    ['answer_text' => 'Javan Hawk-Eagle', 'is_correct' => true],
                    ['answer_text' => 'Sumatran Tiger', 'is_correct' => false],
                    ['answer_text' => 'Bornean Orangutan', 'is_correct' => false],
                    ['answer_text' => 'Komodo Dragon', 'is_correct' => false],
                ]
            ];
        }


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
