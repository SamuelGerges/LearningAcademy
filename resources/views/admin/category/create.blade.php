@extends('admin.index')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h6>Categories / Add New</h6>
            <a href="{{route('admin.ShowCategory')}}" class="btn btn-sm btn-primary">Back</a>
        </div>

        @include('admin.inc.errors')

        <form method="POST" action="{{ route('admin.storeCategory')}}">
            @csrf
            <div class="form-group">
                <lable>Name Category</lable>
                <input type="text" name="name" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
