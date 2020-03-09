@extends('layout')

@section('content')

    <div style="padding-top:2vh" class="" id="section1">
        <div style="padding-top:2vh" class="row justify-content-center d-flex align-items-center">
            <div class="col4">
                <img class="col-12"src="{{$case->image}}" />
            </div>
            <div class="col4">
                <h3 style="">{{$case->name}}</h3>
                <h5 style="text-align:center"><a href="https://steamcommunity.com/market/listings/730/{{$case->name}}" style="color:inherit"><i class="far fa-eye"></i></a></h5>

            </div>
        </div>
    </div>
    <div id="section2">
        <div style="margin-top:3vh;" class="row skinsFromCollection">
            @foreach($items as $item)
                <a class="col-3" href="/item/{{$item->id}}">
                    <div style="border-bottom-color: rgb(235, 75, 75);" class="skin">
                        <img class="col-12"src="{{$item->image}}"/>
                        <h6>{{$item->weapon_name." | ".$item->skin_name}}</h6>
                    </div></a>

            @endforeach


        </div>
    </div>


@endsection
