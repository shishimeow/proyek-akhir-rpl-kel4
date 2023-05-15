<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mbkm extends Model
{
    use HasFactory;

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
}
