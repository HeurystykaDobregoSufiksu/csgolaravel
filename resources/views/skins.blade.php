@extends('layout')

@section('content')

    @foreach($skins as $skin)
        {{$skin->weapon_name}}
    @endforeach
    {{$skins->links()}}

@endsection
