<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ['Benin-City', 'Enugu', 'Kano', 'Lagos'];

        collect($locations)->each(function($location) {
            Location::create([
                'name' => $location,
                'slug' => Str::slug($location),
                'background' => asset('images/'. Str::slug($location) .'.jpg')
            ]);
        });
    }
}
