<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createQuestions();
        $this->syncQuestionsToLocations();
    }

    public function createQuestions() {
        $questions = [
            'Amina makes a meal of _____ from rice flour for lunch everyday.',
            'Danjuma always enjoys Lura soup prepared with ______.',
            'Couscous is the main ingredient used to make ____.',
            'How do Hausas get Nunu?',
            'Kids love this yummy snack made from ground corn and groundnuts!',
            'The people of Kano eat this meal for breakfast or at festivities:'
        ];

        collect($questions)->each(function($question) {
            Question::create([
                'text' => $question
            ]);
        });
    }

    public function syncQuestionsToLocations() {
        // Get All Question Ids
        $ids = Question::pluck('id');

        // Sync Questions to Locations to overwrite existing relationships
        $locations = Location::all();
        $locations->each(function($location) use ($ids){
            $location->questions()->sync($ids);
        });
    }
}
