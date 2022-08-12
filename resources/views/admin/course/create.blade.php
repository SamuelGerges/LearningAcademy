@extends('admin.index')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Courses / Add New </h6>
            <a href="{{route('admin.ShowCourses')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        @include('admin.inc.errors')

        <form method="POST" action="{{ route('admin.storeCourses')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <lable>Name Course</lable>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <lable>Price</lable>
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
                <lable>Category</lable>
                <select name="category_id" class="form-control">
                    @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <lable>Trainer</lable>
                <select name="trainer_id" class="form-control">
                    @foreach($trainers as $trainer)
                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <lable>Small Description</lable>
                <input type="text" name="small_desc" class="form-control">
            </div>
            <div class="form-group">
                <lable>Description</lable>
                <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
