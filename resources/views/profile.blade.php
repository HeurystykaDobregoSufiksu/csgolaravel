@extends('layout')

@section('content')
    <div id="infoProfil" class="row" style="margin-top:10vh">
        <div id="userInfo" class="col-8">
            <table class="table">
                <tr>
                    <td>Nazwa użytkownika: </td>
                    <td><span>{{$userdata->nick}}</span> </td>
                </tr>
                <tr>
                    <td>SteamID64: </td>
                    <td><span>{{$userdata->steamid}} </span> </td>
                </tr>
                <tr>
                    <td>Data rejestracji:  </td>
                    <td><span>{{$userdata->created_at}}</span> </td>
                </tr>
                <tr>
                    <td>Status:  </td>
                    <td><span>user</span> </td>
                </tr>
            </table>
        </div>
        <div id="avatar" class="col-4">
            <div style="text-align:center" class="offset-1 col-10">
                <img class="img-fluid" src="{{$userdata->avatar}}" />
            </div>
        </div>
    </div>




@endsection
