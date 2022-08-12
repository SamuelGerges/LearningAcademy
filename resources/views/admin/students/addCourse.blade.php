@extends('admin.index')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Students/ Edit /  / Add Course</h6>
            <a href="{{route('admin.ShowStudents')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        @include('admin.inc.errors')

        <form method="POST" action="{{route('admin.StoreNewCourseForStudent',$student_id)}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$student_id}}">
            <div class="form-group">
                <lable>Name Course</lable>
                <select name="course_id" class="form-control">
                    @foreach($courses as $course)
{{--                        @if($course->id != )--}}
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
