@extends('adminlte::page')

@section('content_header')
    <h1>edit exam</h1>
@endsection

@section('content')
    <div class="row mt-1">
        <form method="post" action="{{route('exam.update',$data->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">quiz name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
