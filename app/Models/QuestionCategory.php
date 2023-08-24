<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $fillable = ['category_id', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
