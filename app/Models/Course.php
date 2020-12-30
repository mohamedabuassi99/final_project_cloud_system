<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];


    public function students()
    {
        return $this->belongsToMany(Student::class,'registration')->withPivot('mark');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'dep_id');
    }

    public function financial()
    {
        return $this->belongsTo(Financial::class);
    }
}
