<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [
            [
                'question_id' => 1,
                'answer' => 'A) Berlin',
                'is_correct' => false,
            ],
            [
                'question_id' => 1,
                'answer' => 'B) Madrid',
                'is_correct' => false,
            ],
            [
                'question_id' => 1,
                'answer' => 'C) Paris (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 1,
                'answer' => 'D) Rome',
                'is_correct' => false,
            ],

            [
                'question_id' => 2,
                'answer' => 'A) Venus',
                'is_correct' => false,
            ],
            [
                'question_id' => 2,
                'answer' => 'B) Mars (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 2,
                'answer' => 'C) Jupiter',
                'is_correct' => false,
            ],
            [
                'question_id' => 2,
                'answer' => 'D) Saturn',
                'is_correct' => false,
            ],

            [
                'question_id' => 3,
                'answer' => 'A) Charles Dickens',
                'is_correct' => false,
            ],
            [
                'question_id' => 3,
                'answer' => 'B) William Shakespeare (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 3,
                'answer' => 'C) Jane Austen',
                'is_correct' => false,
            ],
            [
                'question_id' => 3,
                'answer' => 'D) Mark Twain',
                'is_correct' => false,
            ],
            

            [
                'question_id' => 4,
                'answer' => 'A) Elephant',
                'is_correct' => false,
            ],
            [
                'question_id' => 4,
                'answer' => 'B) Giraffe',
                'is_correct' => false,
            ],
            [
                'question_id' => 4,
                'answer' => 'C) Blue Whale (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 4,
                'answer' => 'D) Gorilla',
                'is_correct' => false,
            ],

            [
                'question_id' => 5,
                'answer' => 'A) 1905',
                'is_correct' => false,
            ],
            [
                'question_id' => 5,
                'answer' => 'B) 1912 (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 5,
                'answer' => 'C) 1920',
                'is_correct' => false,
            ],
            [
                'question_id' => 5,
                'answer' => 'D) 1935',
                'is_correct' => false,
            ],

            [
                'question_id' => 6,
                'answer' => 'A) Nucleus',
                'is_correct' => false,
            ],
            [
                'question_id' => 6,
                'answer' => 'B) Mitochondria (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 6,
                'answer' => 'C) Ribosome',
                'is_correct' => false,
            ],
            [
                'question_id' => 6,
                'answer' => 'D) Endoplasmic reticulum',
                'is_correct' => false,
            ],

            [
                'question_id' => 7,
                'answer' => 'A) Harper Lee (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 7,
                'answer' => 'B) J.K. Rowling',
                'is_correct' => false,
            ],
            [
                'question_id' => 7,
                'answer' => 'C) George Orwell',
                'is_correct' => false,
            ],
            [
                'question_id' => 7,
                'answer' => 'D) Ernest Hemingway',
                'is_correct' => false,
            ],

            [
                'question_id' => 8,
                'answer' => 'A) Atlantic Ocean',
                'is_correct' => false,
            ],
            [
                'question_id' => 8,
                'answer' => 'B) Indian Ocean',
                'is_correct' => false,
            ],
            [
                'question_id' => 8,
                'answer' => 'C) Pacific Ocean (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 8,
                'answer' => 'D) Arctic Ocean',
                'is_correct' => false,
            ],

            [
                'question_id' => 9,
                'answer' => 'A) Hydrogen (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 9,
                'answer' => 'B) Helium',
                'is_correct' => false,
            ],
            [
                'question_id' => 9,
                'answer' => 'C) Carbon',
                'is_correct' => false,
            ],
            [
                'question_id' => 9,
                'answer' => 'D) Oxygen',
                'is_correct' => false,
            ],

            [
                'question_id' => 10,
                'answer' => 'A) Seoul',
                'is_correct' => false,
            ],
            [
                'question_id' => 10,
                'answer' => 'B) Beijing',
                'is_correct' => false,
            ],
            [
                'question_id' => 10,
                'answer' => 'C) Tokyo (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 10,
                'answer' => 'D) Bangkok',
                'is_correct' => false,
            ],

            [
                'question_id' => 11,
                'answer' => 'A) Pablo Picasso',
                'is_correct' => false,
            ],
            [
                'question_id' => 11,
                'answer' => 'B) Vincent van Gogh',
                'is_correct' => false,
            ],
            [
                'question_id' => 11,
                'answer' => 'C) Leonardo da Vinci (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 11,
                'answer' => 'D) Michelangelo',
                'is_correct' => false,
            ],

            [
                'question_id' => 12,
                'answer' => 'A)  Peso',
                'is_correct' => false,
            ],
            [
                'question_id' => 12,
                'answer' => 'B) Real (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 12,
                'answer' => 'C) Dollar',
                'is_correct' => false,
            ],
            [
                'question_id' => 12,
                'answer' => 'D) Euro',
                'is_correct' => false,
            ],

            [
                'question_id' => 13,
                'answer' => 'A) 100°C (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 13,
                'answer' => 'B) 0°C',
                'is_correct' => false,
            ],
            [
                'question_id' => 13,
                'answer' => 'C) 50°C',
                'is_correct' => false,
            ],
            [
                'question_id' => 13,
                'answer' => 'D) 200°C',
                'is_correct' => false,
            ],

            [
                'question_id' => 14,
                'answer' => 'A) Isaac Newton',
                'is_correct' => false,
            ],
            [
                'question_id' => 14,
                'answer' => 'B) Albert Einstein (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 14,
                'answer' => 'C) Galileo Galilei',
                'is_correct' => false,
            ],
            [
                'question_id' => 14,
                'answer' => 'D) Stephen Hawking',
                'is_correct' => false,
            ],

            [
                'question_id' => 15,
                'answer' => 'A) Sahara Desert',
                'is_correct' => false,
            ],
            [
                'question_id' => 15,
                'answer' => 'B) Gobi Desert',
                'is_correct' => false,
            ],
            [
                'question_id' => 15,
                'answer' => 'C) Antarctic Desert (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 15,
                'answer' => 'D) Mojave Desert',
                'is_correct' => false,
            ],
        ];

        foreach ($answers as $answer) {
            DB::table('answers')->insert($answer);
        }
    }
}
