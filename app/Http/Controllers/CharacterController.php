<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CharacterController extends Controller
{
    public function index() {
        $characters = Character::select('id', 'name', 'avatar')->get();
        return Inertia::render('Characters', [
            'characters' => $characters
        ]);
    }

    public function show(Character $character) {
        return Inertia::render('Character', [
            'character' => $character
        ]);
    }
}
