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
                'question_id' => 23,
                'answer' => 'A) Berlin',
                'is_correct' => false,
            ],
            [
                'question_id' => 23,
                'answer' => 'B) Madrid',
                'is_correct' => false,
            ],
            [
                'question_id' => 23,
                'answer' => 'C) Paris (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 23,
                'answer' => 'D) Rome',
                'is_correct' => false,
            ],

            [
                'question_id' => 24,
                'answer' => 'A) Venus',
                'is_correct' => false,
            ],
            [
                'question_id' => 24,
                'answer' => 'B) Mars (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 24,
                'answer' => 'C) Jupiter',
                'is_correct' => false,
            ],
            [
                'question_id' => 24,
                'answer' => 'D) Saturn',
                'is_correct' => false,
            ],

            [
                'question_id' => 25,
                'answer' => 'A) Charles Dickens',
                'is_correct' => false,
            ],
            [
                'question_id' => 25,
                'answer' => 'B) William Shakespeare (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 25,
                'answer' => 'C) Jane Austen',
                'is_correct' => false,
            ],
            [
                'question_id' => 25,
                'answer' => 'D) Mark Twain',
                'is_correct' => false,
            ],
            
//----------------------------------------------------------------------------------------------
            [
                'question_id' => 26,
                'answer' => 'A) Elephant',
                'is_correct' => false,
            ],
            [
                'question_id' => 26,
                'answer' => 'B) Giraffe',
                'is_correct' => false,
            ],
            [
                'question_id' => 26,
                'answer' => 'C) Blue Whale (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 26,
                'answer' => 'D) Gorilla',
                'is_correct' => false,
            ],
          ////  ----------------------------------------------------------------------------------------------


            [
                'question_id' => 27,
                'answer' => 'A) 1905',
                'is_correct' => false,
            ],
            [
                'question_id' => 27,
                'answer' => 'B) 1912 (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 27,
                'answer' => 'C) 1920',
                'is_correct' => false,
            ],
            [
                'question_id' => 27,
                'answer' => 'D) 1936',
                'is_correct' => false,
            ],
          //php  --------------------------------------------------------------------

            [
                'question_id' => 28,
                'answer' => 'A) Nucleus',
                'is_correct' => false,
            ],
            [
                'question_id' => 28,
                'answer' => 'B) Mitochondria (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 28,
                'answer' => 'C) Ribosome',
                'is_correct' => false,
            ],
            [
                'question_id' => 28,
                'answer' => 'D) Endoplasmic reticulum',
                'is_correct' => false,
            ],

            [
                'question_id' => 29,
                'answer' => 'A) Harper Lee (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 29,
                'answer' => 'B) J.K. Rowling',
                'is_correct' => false,
            ],
            [
                'question_id' => 29,
                'answer' => 'C) George Orwell',
                'is_correct' => false,
            ],
            [
                'question_id' => 29,
                'answer' => 'D) Ernest Hemingway',
                'is_correct' => false,
            ],

            [
                'question_id' => 30,
                'answer' => 'A) Atlantic Ocean',
                'is_correct' => false,
            ],
            [
                'question_id' => 30,
                'answer' => 'B) Indian Ocean',
                'is_correct' => false,
            ],
            [
                'question_id' => 30,
                'answer' => 'C) Pacific Ocean (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 30,
                'answer' => 'D) Arctic Ocean',
                'is_correct' => false,
            ],

            [
                'question_id' => 31,
                'answer' => 'A) Hydrogen (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 31,
                'answer' => 'B) Helium',
                'is_correct' => false,
            ],
            [
                'question_id' => 31,
                'answer' => 'C) Carbon',
                'is_correct' => false,
            ],
            [
                'question_id' => 31,
                'answer' => 'D) Oxygen',
                'is_correct' => false,
            ],

            [
                'question_id' => 32,
                'answer' => 'A) Seoul',
                'is_correct' => false,
            ],
            [
                'question_id' => 32,
                'answer' => 'B) Beijing',
                'is_correct' => false,
            ],
            [
                'question_id' => 32,
                'answer' => 'C) Tokyo (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 32,
                'answer' => 'D) Bangkok',
                'is_correct' => false,
            ],

            [
                'question_id' => 33,
                'answer' => 'A) Pablo Picasso',
                'is_correct' => false,
            ],
            [
                'question_id' => 33,
                'answer' => 'B) Vincent van Gogh',
                'is_correct' => false,
            ],
            [
                'question_id' => 33,
                'answer' => 'C) Leonardo da Vinci (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 33,
                'answer' => 'D) Michelangelo',
                'is_correct' => false,
            ],

            [
                'question_id' => 34,
                'answer' => 'A)  Peso',
                'is_correct' => false,
            ],
            [
                'question_id' => 34,
                'answer' => 'B) Real (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 34,
                'answer' => 'C) Dollar',
                'is_correct' => false,
            ],
            [
                'question_id' => 34,
                'answer' => 'D) Euro',
                'is_correct' => false,
            ],

            [
                'question_id' => 35,
                'answer' => 'A) 100°C (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 35,
                'answer' => 'B) 0°C',
                'is_correct' => false,
            ],
            [
                'question_id' => 35,
                'answer' => 'C) 50°C',
                'is_correct' => false,
            ],
            [
                'question_id' => 35,
                'answer' => 'D) 200°C',
                'is_correct' => false,
            ],

            [
                'question_id' => 36,
                'answer' => 'A) Isaac Newton',
                'is_correct' => false,
            ],
            [
                'question_id' => 36,
                'answer' => 'B) Albert Einstein (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 36,
                'answer' => 'C) Galileo Galilei',
                'is_correct' => false,
            ],
            [
                'question_id' => 36,
                'answer' => 'D) Stephen Hawking',
                'is_correct' => false,
            ],

            [
                'question_id' => 37,
                'answer' => 'A) Sahara Desert',
                'is_correct' => false,
            ],
            [
                'question_id' => 37,
                'answer' => 'B) Gobi Desert',
                'is_correct' => false,
            ],
            [
                'question_id' => 37,
                'answer' => 'C) Antarctic Desert (Correct)',
                'is_correct' => true,
            ],
            [
                'question_id' => 37,
                'answer' => 'D) Mojave Desert',
                'is_correct' => false,
            ],
        ];

        foreach ($answers as $answer) {
            DB::table('answers')->insert($answer);
        }
    }
}
