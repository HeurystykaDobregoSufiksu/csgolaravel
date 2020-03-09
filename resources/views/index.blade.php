@extends('layout')

@section('content')
    <div style="padding-top:2vh" id="section1">
        <div style="padding-top:2vh" class="row">
            <div style="margin-top:3vh" class="row skinsFromCollection">
                @foreach($cases as $case)
                    <a class="col-3" href="/collection/{{$case->id}}">
                        <div style="border-bottom-color: rgb(235, 75, 75);" class="skin">
                            <img class="col-12"src="{{$case->image}}"/>
                            <h6> {{$case->name}}</h6>
                        </div></a>
                @endforeach

            </div>
        </div>
    </div>


@endsection
