@extends('admin.index')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Students/ Edit / {{$student->name}}</h6>
            <a href="{{route('admin.ShowStudents')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        @include('admin.inc.errors')

        <form method="POST" action="{{route('admin.updateStudents')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$student->id}}">
            <div class="form-group">
                <lable>Name Student</lable>
                <input type="text" name="name" class="form-control" value="{{$student->name}}">
            </div>
            <div class="form-group">
                <lable>Email</lable>
                <input type="text" name="email" class="form-control" value="{{$student->email}}">
            </div>
            <div class="form-group">
                <lable>Speciality</lable>
                <input type="text" name="spec" class="form-control"  value="@if($student->spec !== null) {{$student->spec}} @else not existed data @endif">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
