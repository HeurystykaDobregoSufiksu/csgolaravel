@extends('layout')

@section('content')

    <form method="POST" action="/updatebitskins">
        {{ csrf_field() }}
        <input name="code">
        <button type="submit">Wyslij</button>
    </form>

@endsection
