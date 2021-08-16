<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function index(Location $location) {
        $quiz = $location->questions()->with('answers')->get();
        return Inertia::render('Game/Quiz/Index', [
            'location' => $location,
            'quiz' => $quiz
        ]);
    }

    public function store(Request $request, Location $location) {
        dd($request->all());
    }
}
