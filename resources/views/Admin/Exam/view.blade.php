@extends('adminlte::page')

@section('content_header')
    <div class="row">
        <h1 class="col">{{$title}}</h1>
        <p>
            link for share to people :
            {{route('quiz.start',$slug)}}
        </p>
    </div>
@endsection

@section('content')
<div class="row">
    @foreach($quest as $d)
        <div class="card col-12">
            <div class="card-title">{!! $d["quest"] !!}</div>
            <div class="card-body">
                    @foreach($d["answers"] as $q)
                        @if($d["id"] == $q["quest_id"])
                        <div class="row">
                            {{$q["answer"]}}
                        </div>
                        @endif
                    @endforeach
                <div class="row">
                    right answer : {{$d["answer"]}}
                </div>
                        <div class="row">
                            <div class="col">
                                <form action="{{route('quest.destroy',$d["id"])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">remove</button>
                                </form>
                            </div>
                        </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
