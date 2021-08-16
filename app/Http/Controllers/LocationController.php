<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Meal;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LocationController extends Controller
{
    public function index() {
        $locations = Location::all();
        return Inertia::render('Game/Locations/Index', [
            'locations' => $locations
        ]);
    }

    public function show(Location $location) {
        return Inertia::render('Game/Locations/Show', [
            'location' => $location
        ]);
    }

    public function getMeals(Location $location) {
        $meals = $location->meals;
        return Inertia::render('Game/Locations/Meals/Index', [
            'location' => $location,
            'meals' => $meals
        ]);
    }

    public function getMeal(Location $location, Meal $meal) {
        return Inertia::render('Game/Locations/Meals/Show', [
            'location' => $location,
            'meal' => $meal
        ]);
    }
}
