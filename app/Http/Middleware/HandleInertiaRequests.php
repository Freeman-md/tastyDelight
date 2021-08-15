<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'images' => [
                'backgrounds' => [
                    'complex' => asset('images/image-background.jpg'),
                    'simple' => asset('images/background.jpg'),
                    'recipes' => asset('images/recipes.png'),
                    'adults' => asset('images/adults.png'),
                    'game' => asset('images/game-background.jfif')
                ],
                'avatars' => [
                    'boy' => [
                        "one" => asset('images/avatar-boy-1.png'),
                        "two" => asset('images/avatar-boy-2.png'),
                        "three" => asset('images/avatar-boy-3.png'),
                    ],
                    'girl' => [
                        "one" => asset('images/avatar-girl-1.png'),
                        "two" => asset('images/avatar-girl-2.png'),
                        "three" => asset('images/avatar-girl-3.png'),
                    ],
                ],
                'characters' => [
                    'frame' => asset('images/characters.png'),
                    'boy' => asset('images/character-boy.png'),
                    'girl' => asset('images/character-girl.png'),
                    'olanna' => asset('images/olanna.png'),
                    'ose' => asset('images/ose.png'),
                ],
                'questions' => [
                    'boy' => asset('images/are-you-a-boy.png'),
                    'girl' => asset('images/are-you-a-girl.png')
                ],
                'stars' => [
                    'gold' => asset('images/gold-star.png'),
                    'silver' => asset('images/silver-star.png'),
                    'bronze' => asset('images/bronze-star.png'),
                ],
                'recipe-booklet' => asset('images/recipe-booklet.png'),
                'logo' => asset('images/logo.png'),
            ]
        ]);
    }
}
