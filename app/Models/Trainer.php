<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    //
    protected $table ="trainers";
    protected $guarded = ['id'];
    protected $fillable = [];
    protected $hidden =[];

    public function courses ()
    {
        return $this->hasMany('App\Models\Course');
    }

}
