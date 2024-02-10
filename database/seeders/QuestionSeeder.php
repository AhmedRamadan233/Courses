<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'quiz_id' => 1, // Replace with the actual quiz_id
                'body' => 'What is the capital of France?',
            ],
            [
                'quiz_id' => 1,
                'body' => 'Which planet is known as the "Red Planet"?',
            ],
            [
                'quiz_id' => 1,
                'body' => 'Who wrote "Romeo and Juliet"?',
            ],
            [
                'quiz_id' => 1,
                'body' => 'What is the largest mammal on Earth?',
            ],
            [
                'quiz_id' => 1,
                'body' => 'In what year did the Titanic sink?',
            ],
            [
                'quiz_id' => 1,
                'body' => 'What is the powerhouse of the cell?',
            ],
            [
                'quiz_id' => 1,
                'body' => 'Who is the author of "To Kill a Mockingbird"?',
            ],
            [
                'quiz_id' => 1,
                'body' => 'What is the largest ocean on Earth?',
            ],
            [
                'quiz_id' => 2,
                'body' => 'Which element has the chemical symbol "H"?',
            ],
            [
                'quiz_id' => 2,
                'body' => 'What is the capital of Japan?',
            ],
            [
                'quiz_id' => 2,
                'body' => 'Who painted the Mona Lisa?',
            ],
            [
                'quiz_id' => 2,
                'body' => 'What is the currency of Brazil?',
            ],
            [
                'quiz_id' => 2,
                'body' => 'What is the boiling point of water in Celsius?',
            ],
            [
                'quiz_id' => 2,
                'body' => 'Who developed the theory of relativity?',
            ],
            [
                'quiz_id' => 2,
                'body' => 'What is the largest desert in the world?',
            ],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert($question);
        }
    }
}
