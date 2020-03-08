@extends('layout')

@section('content')


        {{$item->weapon_name}}

    @foreach($tradeups as $tradeup)
        {{$tradeup->skin_name}}
    @endforeach


@endsection
