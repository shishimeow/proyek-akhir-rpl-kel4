<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class SupportCourse extends Model
{
    use HasFactory, Sluggable;

    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'courses_id',
        'courses_name',
        'faculty_id',
        'course_credits',
        'date',
        'desc',
        'picture',
        'rating',
        'slug'
    ];

    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'courses_name'
            ]
        ];
    }

    public function scopeFilter($query){
        if(request()->query('search')){
            return $query->where('courses_name', 'like', '%' . request()->query('search') . '%')
                ->orWhere('courses_id', 'like', '%'. request('search') . '%');
        }
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    public function reviewscs(){
        return $this->hasMany(ReviewSc::class, 'courses_id');
    }
}
