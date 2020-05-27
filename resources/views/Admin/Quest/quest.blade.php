@extends('adminlte::page')

@section('content_header')
    <h1>add quest</h1>
@endsection

@section('content')
    <div class="row mt-1">
        <form method="post" action="{{route('quest.store')}}">
            @csrf
            <textarea name="quest" id="quest"></textarea>

            <div class="form-group">
                <label for="exam">select your exam</label>
                <select class="form-control" id="exam" name="exam">
                    @foreach($data as $d)
                        <option value="{{$d["id"]}}">{{$d["name"]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="count">answers</label>
                <input type="number" class="form-control" id="count" name="count">
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
