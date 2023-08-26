<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id', 'title', 'content', 'vote'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question_category()
    {
        return $this->hasMany(QuestionCategory::class, 'question_id', 'id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'question_categories');
    }
}
