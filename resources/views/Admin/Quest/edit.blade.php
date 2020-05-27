@extends('adminlte::page')

@section('content_header')
    <h1>edit quest</h1>
@endsection

@section('content')
    <div class="row mt-1">
        <form method="post" action="{{route('quest.update',$data->id)}}">
            @csrf
            @method('PUT')
            <textarea name="quest" id="quest">{{$data->quest}}</textarea>

            <div class="form-group">
                <label for="count">answers</label>
                <input type="number" class="form-control" id="count" name="count" value="{{$data->answer_count}}">
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

