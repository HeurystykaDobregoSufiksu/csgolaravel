@extends('layout')

@section('content')

    {{$userdata->steamid}}

    @foreach($items as $item)
        {{$item->market_hash_name}}
    @endforeach

@endsection
