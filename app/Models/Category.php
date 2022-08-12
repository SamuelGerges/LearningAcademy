<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table ="categories";
    protected $guarded = ['id'];
    protected $fillable = ['name'];
    protected $hidden =['created_at','updated_at'];

    public function courses ()
    {
        return $this->hasMany('App\Models\Course');
    }

}
