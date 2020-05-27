@extends('adminlte::page')

@section('content_header')
    <h1>your exams</h1>
@endsection

@section('content')
    <a class="btn btn-success" href="{{route('exam.create')}}">add</a>
    <div class="row mt-1">
        <table class="table">
            <thead>
            <tr>
                @foreach($table as $t)
                    <th scope="col">{{$t["title"]}}</th>
                @endforeach
                <th scope="col">tools</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d)
                <tr>
                    @foreach($table as $t)
                        <th scope="row">{{$d[$t["name"]]}}</th>
                    @endforeach
                    <th scope="row">
                        <div class="row">
                            <a href="{{route('exam.show',$d->id)}}" class="btn btn-success ml-2">view</a>
                            <a href="{{route('exam.edit',$d->id)}}" class="btn btn-warning ml-2">edit</a>
                            <form action="{{route('exam.destroy',$d->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2">delete</button>
                            </form>
                        </div>
                    </th>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection
