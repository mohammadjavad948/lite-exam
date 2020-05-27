@extends('adminlte::page')

@section('content_header')
    <h1>add exam</h1>
@endsection

@section('content')
    <div class="row mt-1">
        <form method="post" action="{{route('exam.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">quiz name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
