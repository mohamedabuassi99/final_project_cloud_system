<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Course::class,'registration')->withPivot(['id','mark']);
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'dep_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Pay::class);
    }
}
