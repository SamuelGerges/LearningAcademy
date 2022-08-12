<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table ="students";
    protected $guarded = ['id'];
    protected $fillable = [];
    protected $hidden =[];


    public function courses ()
    {
        return $this->belongsToMany('App\Models\Course',
            'course_students',
            'student_id','course_id',
            'id','id'
        )->withPivot('status');
    }



}
