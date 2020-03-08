@extends('layout')

@section('content')

@foreach($cases as $case)
    {{$case->name}}
@endforeach

@endsection
