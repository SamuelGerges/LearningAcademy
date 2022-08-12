@extends('admin.index')
@section('content')
    <div class="container m-5 p-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Students</h2>
            <a href="{{ route('admin.createStudents')}}" class="btn btn-sm btn-primary">Add New Student</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Speciality</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop-> iteration }}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>
                        @if($student->spec !== null)
                            {{$student->spec}}
                        @else
                            not existed data
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-light" href="{{route('admin.ShowCoursesOFStudent',$student->id)}}">Show Courses</a>
                        <a class="btn btn-light" href="{{route('admin.editStudents',$student->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('admin.deleteStudents',$student->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-100 mb-5">
            {!! $students->render() !!}
        </div>
    </div>
@endsection
