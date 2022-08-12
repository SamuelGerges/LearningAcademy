@extends('admin.index')
@section('content')
    <div class="container m-5 p-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Trainers</h2>
            <a href="{{ route('admin.createTrainer')}}" class="btn btn-sm btn-primary">Add New Trainer</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name Trainer</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Speciality</th>
                <th scope="col">Operation</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trainers as $trainer)
                <tr>
                    <td>{{ $loop-> iteration }}</td>
                    <td><img src="{{asset('uploads/trainers/'.$trainer->image)}}" height="50px" alt=""></td>
                    <td>{{$trainer->name}}</td>
                    <td>
                        @if($trainer->phone !== null)
                            {{$trainer->phone}}
                        @else
                            not existed
                        @endif
                    </td>
                    <td>{{$trainer->spec}}</td>
                    <td>
                        <a class="btn btn-light" href="{{route('admin.editTrainer',$trainer->id)}}">Edit</a>
                        <a class="btn btn-danger" href="{{route('admin.deleteTrainer',$trainer->id)}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center w-100 mb-5">
            {!! $trainers->render() !!}
        </div>
    </div>
@endsection
