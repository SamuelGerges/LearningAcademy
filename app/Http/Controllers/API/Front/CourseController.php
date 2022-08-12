<?php

namespace App\Http\Controllers\API\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use GeneralTrait;
    public function ShowCategories()
    {
        $data['categories'] = Category::select('id','name')->get();
        return $this->returnSuccessMessage($data,'200');
    }
    public function ShowCategory($category_id)
    {
        $data['categories'] = Category::findOrFail($category_id);
        $data['courses']  = Course::where('category_id' ,$category_id)->get();
        return $this->returnSuccessMessage($data,'200');
    }
    public function ShowCourse($id,$c_id)
    {
        $data['course'] = Course::findOrFail($c_id);
        return $this->returnSuccessMessage($data,'200');
    }

}
