@extends('admin.index')
@section('content')
    <div class="container m-5 p-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Courses / Show Courses</h2>
            <div class="">
                <a href="{{route('admin.AddNewCourseForStudent',$student_id)}}" class="btn btn-sm btn-info">Add New Course</a>
                <a href="{{route('admin.ShowStudents')}}" class="btn btn-sm btn-primary">Back</a>
            </div>


        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name Course</th>
                <th scope="col">Category</th>
                <th scope="col">Trainer</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $loop-> iteration }}</td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->category->name}}</td>
                    <td>{{$course->trainer->name}}</td>
                    <td>{{$course->pivot->status}}</td>
                    <td>
                        @if($course->pivot->status !== 'Approve')
                                <a class="btn btn-light" href="{{route('admin.approveCourse',[$student_id,$course->id])}}">Approve</a>
                        @endif
                        @if($course->pivot->status !== 'Reject')
                                <a class="btn btn-danger" href="{{route('admin.rejectCourse',[$student_id,$course->id])}}">Reject</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-100 mb-5">
{{--            {!! $courses->render() !!}--}}
        </div>
    </div>
@endsection


