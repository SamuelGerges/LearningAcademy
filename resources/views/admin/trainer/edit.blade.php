@extends('admin.index')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Trainers/ Edit / {{$trainer->name}}</h6>
            <a href="{{route('admin.ShowTrainer')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        @include('admin.inc.errors')

        <form method="POST" action="{{route('admin.updateTrainer')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$trainer->id}}">
            <div class="form-group">
                <lable>Name Trainer</lable>
                <input type="text" name="name" class="form-control" value="{{$trainer->name}}">
            </div>
            <div class="form-group">
                <lable>Phone Number</lable>
                <input type="text" name="phone" class="form-control" value="{{$trainer->phone}}">
            </div>
            <div class="form-group">
                <lable>Speciality</lable>
                <input type="text" name="spec" class="form-control" value="{{$trainer->spec}}">
            </div>

            <div class="form-group">
                <img src="{{asset('uploads/trainers/'.$trainer->image)}}" height="50px" alt="" class="my-5">
                <input type="file" name="image" class="form-control-file">

            </div>



            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
