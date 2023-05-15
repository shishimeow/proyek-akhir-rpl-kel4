<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewMbkm extends Model
{
    use HasFactory;
    public $fillable = [
        'rev_mbkm',
        'mbkm_id',
        'user_id',
        'rating'
    ];

    public function mbkm(){
        return $this->belongsTo(Mbkm::class, 'mbkm_id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
