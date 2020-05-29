@extends('layouts.app')

@section('content')
    <form action="{{route('exam.save')}}" method="post">
        @csrf

        @php
        $i = 1;
        $k = 1;
        @endphp

        @foreach($data as $d)
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <div class="card w-75 mt-3" style="padding: 8px;">
                            <div class="card-title" style="font-size: 28px;">
                                {!! $d["quest"] !!}
                            </div>
                            <div class="card-body">
                                @php
                                    $x = 1;
                                @endphp
                                @foreach($d["answers"] as $a)
                                    @if($a["quest_id"] == $d["id"])
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="answer{{$i}}" id="answer{{$k}}" value="{{$x}}">
                                        <label class="form-check-label" for="answer{{$k}}">
                                           {{$a["answer"]}}
                                        </label>
                                    </div>
                                    @php
                                        $k++;
                                        $x++;
                                    @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-success">submit</button>
            </div>
        </div>
    </form>
@endsection
