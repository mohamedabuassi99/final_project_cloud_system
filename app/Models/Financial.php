<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
