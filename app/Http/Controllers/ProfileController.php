<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function index() {
        return Inertia::render('Profile/Index');
    }

    public function edit(User $user) {
        return Inertia::render('Profile/Edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user) {
        $fields = $request->validate([
            'username' => ['required', 'string'],
            'age' => ['required', 'integer', 'min:2', 'max:18'],
        ]);

        $user->update([
            'username' => $fields['username'],
            'age' => $fields['age'],
            'password' => !empty($request->password) ? Hash::make($request->password) : Hash::make(auth()->user()->password)
        ]);

        return Inertia::render('Profile/Edit', [
            'user' => $user
        ]);
    }

    public function delete(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();   

        auth()->user()->delete();

        auth()->guard('web')->logout();

        return Inertia::render('Auth/Login');
    }

    public function editAvatar(User $user) {
        return Inertia::render('Profile/Avatar', [
            'user' => $user
        ]);
    }

    public function updateAvatar(Request $request, User $user) {
        $fields = $request->validate([
            'avatar' => ['required', 'string']
        ]);

        $user->update([
            'avatar' => $fields['avatar']
        ]);

        return redirect(route('profile.edit', ['user' => $user]));
    }
}
