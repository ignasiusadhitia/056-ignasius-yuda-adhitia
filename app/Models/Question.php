<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'question_text',
        'difficulty_level',
        'category_id',
        'user_id',
        'image_url',
        'points',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function calculatePoints($difficulty_level)
    {
        switch ($difficulty_level) {
            case 'easy':
                return 1;
            case 'medium':
                return 3;
            case 'hard':
                return 5;
            default:
                return 0;
        }
    }

    public static function rules()
    {
        return [
            'question_text' => 'required|string|max:255',
            'difficulty_level' => 'required|in:easy,medium,hard',
            'category_id' => 'required|integer|exists:categories,id',
            'points' => 'required|integer|min:1',
            'answers.*.text' => 'required|string|max:255',
            'answers.*.is_correct' => 'required|boolean',
        ];
    }
}
