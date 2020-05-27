@extends('adminlte::page')

@section('content_header')
    <h1>add answer</h1>
@endsection

@section('content')
    <div class="row mt-1">
        <form method="post" action="{{route('answer.store')}}">
            @csrf

            @for($i = 1; $i <= $count; $i++)
                <div class="form-group">
                    <label for="answer{{$i}}">answer {{$i}}</label>
                    <input type="text" class="form-control" id="answer{{$i}}" name="answer{{$i}}">
                </div>
            @endfor

            <div class="form-group">
                <label for="right">right answer</label>
                <input type="number" class="form-control" id="right" name="right">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'quest' );
    </script>
@endsection
