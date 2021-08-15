<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = ['name', 'image', 'background', 'description'];

    public function meals() {
        return $this->belongsToMany(Meal::class);
    }

    public function questions() {
        return $this->belongsToMany(Question::class);
    }
}
