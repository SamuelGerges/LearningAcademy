@extends('admin.index')
@section('content')
    <div class="container m-5 p-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Courses</h2>
            <a href="{{ route('admin.createCourses')}}" class="btn btn-sm btn-primary">Add New Course</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name Course</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Trainer</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $loop-> iteration }}</td>
                    <td><img src="{{asset('uploads/courses/'.$course->image)}}" height="50px" alt=""></td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->price}}</td>
                    <td>{{$course->category->name}}</td>
                    <td>{{$course->trainer->name}}</td>
                    <td>
                        <a class="btn btn-light" href="{{route('admin.ShowStudentsOfCourses',$course->id)}}">Show Student</a>
                        <a class="btn btn-light" href="{{route('admin.editCourses',$course->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('admin.deleteCourses',$course->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-100 mb-5">
            {!! $courses->render() !!}
        </div>
    </div>
@endsection
