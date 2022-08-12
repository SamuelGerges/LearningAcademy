@extends('admin.index')
@section('content')
    <div class="container m-5 p-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Categories</h2>
            <a href="{{ route('admin.createCategory')}}" class="btn btn-sm btn-primary">Add New Category</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name Category</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $category)
                <tr>
                    <td>{{ $loop-> iteration }}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a class="btn btn-light" href="{{route('admin.editCategory',$category->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('admin.deleteCategory',$category->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
