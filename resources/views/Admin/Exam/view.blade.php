@extends('adminlte::page')

@section('content_header')
    <h1>{{$title}}</h1>
@endsection

@section('content')
<div class="row">
    @foreach($quest as $d)
        <div class="card col-12">
            <div>{!! $d["quest"] !!}</div>
            <div class="card-body">
                <div class="row">
                    @foreach($d["answers"] as $q)
                        @if($d["id"] == $q["quest_id"])
                        <div class="col-12">{{$q["answer"]}}</div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
