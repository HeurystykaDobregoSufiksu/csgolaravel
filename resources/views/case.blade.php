@extends('layout')

@section('content')


        {{$case->name}}

    @foreach($items as $item)
        {{$item->skin_name}}
    @endforeach


@endsection
