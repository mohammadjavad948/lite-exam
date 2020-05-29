@extends('layouts.app')

@section('content')
    <form action="#" method="post">
        @csrf

        @php
        $i = 1;
        $k = 1;
        @endphp

        @foreach($data as $d)
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <div class="card w-75">
                            <h1 class="card-title">
                                {!! $d["quest"] !!}
                            </h1>
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
    </form>
@endsection
