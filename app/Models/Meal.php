<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $table = 'meals';

    protected $fillable = ['name', 'image', 'background', 'description'];

    public function locations() {
        return $this->belongsToMany(Location::class);
    }
}
