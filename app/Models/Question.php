<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = ['text'];

    public function answers() {
        return $this->belongsToMany(Answer::class)->withPivot('correct');
    }

    public function locations() {
        return $this->belongsToMany(Location::class);
    }
}
