<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table ="settings";
    protected $guarded = ['id'];
    protected $fillable = ['id','name','logo','favicon','city','address','phone',
        'work_hours','email','map','fb','twitter','insta'];
    protected $hidden =['created_at','updated_at'];


}
