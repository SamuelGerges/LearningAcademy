<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Newsletter;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    public function NewsLetter(Request $request)
    {
       $data = $request->validate([
           'email' => 'required|email|max:100'
       ]);
       Newsletter::create($data);
       return back();
    }

    public function Contact(Request $request)
    {
        $data = $request->validate([
            'name' =>'required|string|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'nullable|string|max:100',
            'message' => 'required|string|max:100000'
        ]);
        Message::create($data);
        return back();
    }
    public function Enroll(Request $request)
    {
        $data = $request->validate([
            'name' =>'nullable|string|max:100',
            'email' => 'required|email|max:100',
            'spec' => 'nullable|string|max:100',
            'course_id' => 'required|exists:cources,id'
        ]);

        $old_student = Student::select('id')->where('email',$data['email'])->first();

        if($old_student === null)
        {
            $student =Student::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'spec' => $data['spec'],
            ]);
            $student_id = $student->id;
        }
        else{
            $student_id = $old_student->id;
            if($data['name'] !== null || $data['spec'] !== null)
            {
                $old_student->update(['name' =>$data['name'],'spec' => $data['spec']]);
            }
        }

        DB::table('course_students')->insert([
            'course_id' => $data['course_id'],
            'student_id' => $student_id,
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        return back();
    }
}
