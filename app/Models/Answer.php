<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';

    protected $fillable = ['text'];

    public function questions() {
        return $this->belongsToMany(Question::class)->withPivot('correct');
    }
}
