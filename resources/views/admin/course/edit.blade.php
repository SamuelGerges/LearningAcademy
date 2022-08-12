@extends('admin.index')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Courses/ Edit / {{$course->name }}</h6>
            <a href="{{route('admin.ShowCourses')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        @include('admin.inc.errors')

        <form method="POST" action="{{route('admin.updateCourses')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$course->id}}">
            <div class="form-group">
                <lable>Name Course</lable>
                <input type="text" name="name" value="{{$course->name}}" class="form-control">
            </div>
            <div class="form-group">
                <lable>Price</lable>
                <input type="text" name="price"  value="{{$course->price}}" class="form-control">
            </div>
            <div class="form-group">
                <lable>Category</lable>
                <select name="category_id" class="form-control">
                    @foreach($category as $category)
                        <option value="{{$category->id}}" @if($course->category_id == $category->id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <lable>Trainer</lable>
                <select name="trainer_id" class="form-control">
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}" @if($course->trainer_id == $trainer->id) selected @endif>{{ $trainer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <lable>Small Description</lable>
                <input type="text" name="small_desc" value="{{$course->small_desc}}" class="form-control">
            </div>
            <div class="form-group">
                <lable>Description</lable>
                <textarea name="description" class="form-control" cols="30" rows="10">{{$course->description}}</textarea>
            </div>
            <div class="form-group">
                <img src="{{asset('uploads/courses/'.$course->image)}}" height="50px" alt="" class="my-5">
                <input type="file" name="image" class="form-control-file">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
