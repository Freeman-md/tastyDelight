<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Character::create([
            'name' => 'Olanna',
            'gender' => 'Female',
            'avatar' => asset('images/olanna.png'),
            'image' => asset('images/character-girl.png'),
            'description' => 'Olanna is a very friendly girl. She is ten years old and lives with her parents and brother, Ose. Olanna loves to draw and make videos! She is always making videos of places she goes whenever she travels with her parents. Olanna loves to eat Abacha whenever she visits her grandma in Enugu State. '
        ]);

        Character::create([
            'name' => 'Ose',
            'gender' => 'Male',
            'avatar' => asset('images/ose.png'),
            'image' => asset('images/character-boy.png'),
            'description' => 'Ose is a boy who loves to cook. He is nine years old and is Olanna’s twin brother. Ose would like to be a Chef when he grows up. During the holidays, Ose practices how to make new Nigerian meals withhis mother. Ose is currently learning how to roast Boli with his Uncle, which is also his favorite meal.'
        ]);
    }
}
