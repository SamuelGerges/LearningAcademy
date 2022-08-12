<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    public function ShowCourse()
    {
        $data['courses'] = Course::select('id','name','price','image','category_id','trainer_id')->paginate(3);
        return view('admin.course.index')->with($data);
    }
    public function CreateCourse()
    {
        $data['category'] = Category::select('id','name')->get();
        $data['trainers'] = Trainer::select('id','name')->get();

        return view('admin.course.create')->with($data);
    }

    public function StoreCourse(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:50',
            'small_desc'   => 'required|string|max:200',
            'description'  => 'required|string',
            'price'        => 'required|numeric',
            'category_id'  =>'required|exists:categories,id',
            'trainer_id'   =>'required|exists:trainers,id',
            'image'        => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $new_name =  $data['image']->hashName();
        Image::make($data['image'])->resize(570,356)->save(public_path('uploads/courses/'.$new_name));
        $data['image'] = $new_name;
        Course::create($data);
        return redirect(route('admin.ShowCourses'));
    }
    public function EditCourse($id)
    {
        $data['category'] = Category::select('id','name')->get();
        $data['trainers'] = Trainer::select('id','name')->get();
        $data['course'] = Course::findOrFail($id);
        return view('admin.course.edit')->with($data);
    }

    public function UpdateCourse(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:50',
            'small_desc'   => 'required|string|max:200',
            'description'  => 'required|string',
            'price'        => 'required|numeric',
            'category_id'  => 'required|exists:categories,id',
            'trainer_id'   => 'required|exists:trainers,id',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png',
        ]);
        $old_name = Course::findOrFail($request->id)->image;
        if($request->hasFile('image'))
        {
            Storage::disk('uploads')->delete('courses/'.$old_name);
            $new_name =  $data['image']->hashName();
            Image::make($data['image'])->resize(570,356)->save(public_path('uploads/courses/'.$new_name));
            $data['image'] = $new_name;
        }
        else
        {
            $data['image'] = $old_name;
            Course::findOrFail($request->id)->update($data);
        }
        Course::findOrFail($request->id)->update($data);
        return redirect(route('admin.ShowCourses'));

    }

    public function DeleteCourse($id)
    {
        $image_current = Course::findOrFail($id)->image;
        Storage::disk('uploads')->delete('courses/'.$image_current);
        Course::findOrFail($id)->delete();
        return back();
    }
    public function ShowStudents($id)
    {
        $data['students'] = Course::findOrFail($id)->students;
        return view('admin.course.show_student')->with($data);

    }
}
