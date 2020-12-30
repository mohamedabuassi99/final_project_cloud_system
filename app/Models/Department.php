<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
