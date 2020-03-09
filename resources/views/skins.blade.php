@extends('layout')

@section('content')
    <div style="padding-top:2vh" id="section1">
        <div style="padding-top:2vh" class="row">
            <div style="margin-top:3vh" class="row skinsFromCollection">
                @foreach($skins as $skin)
                    <a class="col-3" href="/item/{{$skin->id}}">
                    <div style="border-bottom-color: rgb(235, 75, 75);" class="skin">
                        <img class="col-12"src="{{$skin->image}}"/>
                        <h6> {{$skin->weapon_name." ".$skin->skin_name}}</h6>
                    </div></a>
                @endforeach

            </div>
        </div>
    </div>



    {{$skins->links()}}

@endsection
