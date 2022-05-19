<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ["body", "question_id"];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function votes(){
        return $this->belongsToMany(User::class)->wherePivot('vote', true);;
    }

}
