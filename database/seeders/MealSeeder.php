<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Meal;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createMeals();
        $this->syncMealsToLocations();
    }

    public function createMeals() {
        $meals = ["Tuwon Shinkafa With Miyan Kuka", "Fura De'Nunu (Nunu)", "Masa (Rice Cake)", "Donkwa", "Burabisco"];

        // Create Five Meals
        collect($meals)->each(function($meal, $index) {
            $index = $index + 1;
            Meal::create([
                'name' => $meal,
                'slug' => Str::slug($meal),
                'background' => asset("images/food-{$index}-main.png")
            ]);
        });
    }

    public function syncMealsToLocations() {
        // Get All Meal Ids
        $ids = Meal::pluck('id');

        // Sync Meals to Locations to overwrite existing relationships
        $locations = Location::all();
        $locations->each(function($location) use ($ids){
            $location->meals()->sync($ids);
        });
    }
}
