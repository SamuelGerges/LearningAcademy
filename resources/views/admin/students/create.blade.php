@extends('admin.index')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Students / Add New </h6>
            <a href="{{route('admin.ShowStudents')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        @include('admin.inc.errors')

        <form method="POST" action="{{ route('admin.storeStudents')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <lable>Name Student</lable>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <lable>Email</lable>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <lable>Speciality</lable>
                <input type="text" name="spec" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
