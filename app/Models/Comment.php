<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $fillable = [
        'rev_id',
        'user_id',
        'parent_id',
        'comment',
        'commentable_id',
        'commentable_type'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reviewsc(){
        return $this->belongsTo(ReviewSc::class, 'rev_id');
    }

    public function reviewmbkm(){
        return $this->belongsTo(ReviewMbkm::class, 'rev_id');
    }

    public function replies(){
        return $this->morphMany(Comment::class, 'commentable');
    }

}
