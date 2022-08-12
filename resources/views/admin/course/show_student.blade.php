@extends('admin.index')
@section('content')
    <div class="container m-5 p-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Students / Show Student</h2>
            <a href="{{route('admin.ShowCourses')}}" class="btn btn-sm btn-primary">Back</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>

            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $loop-> iteration }}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-100 mb-5">
{{--            {!! $students->render() !!}--}}
        </div>
    </div>
@endsection
