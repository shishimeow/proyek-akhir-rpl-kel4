<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewSc extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    public $fillable = [
        'rev_sc',
        'courses_id',
        'user_id',
        'rating'
    ];

    public function supportcourse(){
        return $this->belongsTo(SupportCourse::class, 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
