<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table ="cources";
    protected $guarded = ['id'];
//    protected $fillable = ['id','name','small_desc','description','price','image','category_id','trainer_id'];
    protected $hidden =['created_at','updated_at'];

    public function category ()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function trainer ()
    {
        return $this->belongsTo('App\Models\Trainer');
    }

    public function students ()
    {
        return $this->belongsToMany('App\Models\Student',
            'course_students',
            'course_id',
            'student_id',
            'id',
            'id'

        );
    }



}
