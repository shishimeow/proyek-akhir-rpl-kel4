<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class mbkm extends Model
{
    use HasFactory, Sluggable;

    protected $primaryKey = 'id';
    public $timestamps = false;
    public $fillable = [
        'mbkm_name',
        'periode_begin',
        'periode_end',
        'excerpt',
        'positions',
        'benefit',
        'requirements',
        'picture',
        'rating',
        'slug'
    ];

    public function scopeFilter($query){
        if(request()->query('search')){
            return $query->where('mbkm_name', 'like', '%' . request()->query('search') . '%')
                ->orWhere('positions', 'like', '%'. request('search') . '%')
                ->orWhere('requirements', 'like', '%'. request('search') . '%');
        }
    }

    public function reviewmbkm(){
        return $this->hasMany(ReviewMbkm::class);
    }

    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'courses_name'
            ]
        ];
    }
}
