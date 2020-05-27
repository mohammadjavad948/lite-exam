@extends('adminlte::page')

@section('content_header')
    <h1>edit answer</h1>
@endsection

@section('content')
    <div class="row mt-1">
        <form method="post" action="{{route('answer.update',3)}}">
            @csrf
            @method('PUT')
            @php
            $i = 0;
            @endphp
            @foreach($data as $d)
                <div class="form-group">
                    <label for="answer{{$i + 1 }}">answer {{$i + 1 }}</label>
                    <input type="text" class="form-control" id="answer{{$i + 1 }}" name="answer{{$i + 1 }}" value="@if($d['answers'][$i]["answer"] !== null) {{ $d['answers'][$i]["answer"]  }} @endif">
                </div>
                @php
                $i++;
                @endphp
            @endforeach

            <div class="form-group">
                <label for="right">right answer</label>
                <input type="number" class="form-control" id="right" name="right">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
