<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAnswers();
        $this->syncAnswersToQuestions();
    }

    public function createAnswers() {
        $answers = [
            [ 'Tuwo Shinkafa', 'Tuwo Masara', 'Tuwo Gieda' ],
            [ 'Baobab Leaves', 'Babasa Leaves', 'Dawada Leaves' ],
            [ 'Gandaki', 'Burukutu', 'Burabisco' ],
            [ 'By crushing sugar canes', 'By fermenting cow\'s milk', 'By soaking millet' ],
            [ 'Puff-puff', 'Akara', 'Donkwa' ],
            [ 'Masa', 'Ogede', 'Eggs' ]
        ];

        collect($answers)->each(function($answerCollection) {
            collect($answerCollection)->each(function($answer) {
                Answer::create([
                    'text' => $answer
                ]);
            });
        });  
    }

    public function syncAnswersToQuestions() {
        // Get All Answer Ids
        $ids = Answer::pluck('id');
        $ids = $ids->chunk(3)->toArray();

        // Sync Questions to Locations to overwrite existing relationships
        $questions = Question::all();
        $questions->each(function($question, $index) use ($ids){
            $question->answers()->sync($ids[$index]);
            $this->setCorrectQuestionAnswer($question);
        });
    }

    public function setCorrectQuestionAnswer($question) {
        $answer = $question->answers()->first();

        // Set correct question answer
        $question->answers()->updateExistingPivot($answer, array('correct' => true), false);
    }
}
