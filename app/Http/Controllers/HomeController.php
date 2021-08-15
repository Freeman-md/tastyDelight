<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Validation\Rules;

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
