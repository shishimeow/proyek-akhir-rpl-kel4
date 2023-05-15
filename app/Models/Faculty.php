<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = [
        'faculty_name',
        'slug'
    ];

    public function supportcourses(){
        return $this->hasMany(SupportCourse::class);
    }
}
