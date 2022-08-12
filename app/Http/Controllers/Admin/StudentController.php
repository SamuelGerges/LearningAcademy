<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function ShowStudent()
    {
        $data['students'] = Student::select('id','name','email','spec')->paginate(10);
        return view('admin.students.index')->with($data);
    }
    public function CreateStudent()
    {
        return view('admin.students.create');
    }

    public function StoreStudent(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:50',
            'email' => 'required|email|unique:students',
            'spec' => 'nullable|string|max:30',
        ]);
        Student::create($data);
        return redirect(route('admin.ShowStudents'));
    }
    public function EditStudent($id)
    {
        $data['student'] = Student::findOrFail($id);
        return view('admin.students.edit')->with($data);
    }

    public function UpdateStudent(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:50',
            'email' => 'required|email|unique:students',
            'spec' => 'nullable|string|max:30',
        ]);

        Student::findOrFail($request->id)->update($data);
        return redirect(route('admin.ShowStudents'));

    }

    public function DeleteStudent($id)
    {
        Student::findOrFail($id)->delete();
        return back();
    }
    public function ShowCourses($id)
    {
        $data['courses'] = Student::findOrFail($id)->courses;
        $data['student_id'] = $id;

        return view('admin.students.show_course')->with($data);

    }


    public function ApproveCourse($student_id,$course_id)
    {
        DB::table('course_students')
            ->where(['student_id' =>$student_id ,'course_id' => $course_id])
            ->update([
                'status' => 'Approve',
            ]);
        return back();
    }
    public function RejectCourse($student_id,$course_id)
    {
        DB::table('course_students')
            ->where(['student_id' =>$student_id ,'course_id' => $course_id])
            ->update([
                'status' => 'Reject',
            ]);
        return back();
    }

    public function AddCourses($id)
    {
        $data['student_id'] = $id;
        $registered_courses = DB::table('course_students')
            ->select('course_id')->
            where('student_id', $id)->get()->toArray();

        $all_registered_courses_ids = [];
        foreach ($registered_courses as $c){
            if (!in_array($c->course_id, $all_registered_courses_ids, true))
                $all_registered_courses_ids[] =  $c->course_id;
        }

        $data['courses'] = Course::select('id','name')
            ->whereNotIn('id', $all_registered_courses_ids)->get();


        // select id from students where id Not IN (7, 6)

        return view('admin.students.addCourse')->with($data);
    }

    public function StoreCourses($id, Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required|exists:cources,id|exists:course_students,course_id'
        ]);

        DB::table('course_students')->insert([
            'student_id' => $id,
            'course_id' => $data['course_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect(route('admin.ShowCoursesOFStudent',$id));
    }
}
