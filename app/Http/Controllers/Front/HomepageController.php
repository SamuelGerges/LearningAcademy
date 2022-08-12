<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SiteContent;
use App\Models\Student;
use App\Models\Test;
use App\Models\Trainer;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public  function index()
    {
        $data['banner_content'] = SiteContent::select('content')->where('name','Banner')->first();
        $data['courses_content'] = SiteContent::select('content')->where('name','Courses')->first();
        $data['testimonial_content'] = SiteContent::select('content')->where('name','Testimonial')->first();
        $data['awesome_Feature_content'] = SiteContent::select('content')->where('name','Awesome Feature')->first();
        $data['better_content'] = SiteContent::select('content')->where('name','Better Feature')->first();
        $data['trainers_content'] = SiteContent::select('content')->where('name','Qualified Trainers')->first();
        $data['job_content'] = SiteContent::select('content')->where('name','Job Opportunity')->first();



        $data['courses'] = Course::select('id','name','small_desc','price','image','category_id','trainer_id')
            ->orderBy('id','asc')
            ->take(3)
            ->get();
        $data['tests'] = Test::select('name','spec','description','image')->get();
        $data['courses_count']   = Course::count();
        $data['trainers_count']  = Trainer::count();
        $data['students_count']  = Student::count();
        return view('front.index')->with($data);
    }
}
