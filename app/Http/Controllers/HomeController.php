<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HomeController extends Controller
{
    public function index() {
        return Inertia::render('Index');
    }

    public function recipes() {
        return Inertia::render('Recipes');
    }

    public function adults() {
        return Inertia::render('Adults');
    }
}
