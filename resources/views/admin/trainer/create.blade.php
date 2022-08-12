@extends('admin.index')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Trainers / Add New </h6>
            <a href="{{route('admin.ShowTrainer')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        @include('admin.inc.errors')

        <form method="POST" action="{{ route('admin.storeTrainer')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <lable>Name Trainer</lable>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <lable>Phone Number</lable>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <lable>Speciality</lable>
                <input type="text" name="spec" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
