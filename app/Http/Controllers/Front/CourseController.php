<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function ShowCategories()
    {
        $data['categories'] = Category::select('id','name')->get();

        return view('front.courses.category')->with($data);
    }
    public function ShowCategory($category_id)
    {
        $data['categories'] = Category::findOrFail($category_id);
        $data['courses']  = Course::where('category_id' ,$category_id)->paginate(1);

        return view('front.courses.category')->with($data);

    }
    public function ShowCourse($id,$c_id)
    {
        $data['course'] = Course::findOrFail($c_id);
        return view('front.courses.show')->with($data);
    }

}
