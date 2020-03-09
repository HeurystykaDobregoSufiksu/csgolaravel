@extends('layout')

@section('content')


    <div style="padding-top:8vh" id="section1">
        <div style="padding-top:2vh" class="row">
            <div class="col-3">
                <div class="jumbotron">
                    <img class="col-12" src="{{$item->image}}" />
                    <table id="infoTable">
                        <tbody>
                        <tr>
                            <th>Name:</th>
                            <td> {{$item->weapon_name." ".$item->skin_name}}</td>
                        </tr>
                        <tr>
                            <th>Rarity:</th>
                            <td>{{$item->rarity}}</td>
                        </tr>
                        <tr>
                            <th>Collection:</th>
                            <td>{{$item->name}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="jumbotron bg-dark">
                    <h5 style="text-align:center"> Collection info</h5>
                    <img class="col-12"src="https://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXU5A1PIYQNqhpOSV-fRPasw8rsUFJ5KBFZv668FFQu0PaQIm9DtY6wzYaIxKWtN7iJwW8G6Z0h2LqWoY6s2Qy2-0Q_Nzv7IJjVLFGZqUbjlQ/256fx256f" />
                    <h6 style="padding-bottom:2vh">Huntsman Weapon Case</h6>
                    <img class="col-12"src="https://csgostash.com/img/collections/the_huntsman_collection.png" />
                    <h6>The Huntsman Collection</h6>
                </div>
            </div>
            <div class="col-9 d-flex">
                <div id="content" class="col-12">
                    <div class="row">
                        <table class=" table table-sm table-dark">
                            <thead>
                            <tr>
                                <th scope="col">Factory New</th>
                                <th scope="col">Minimal Wear</th>
                                <th scope="col">Field-Tested</th>
                                <th scope="col">Well-Worn</th>
                                <th scope="col">Battle-Scarred</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="table-success">0.00 - 0.07</td>
                                <td class="table-primary">0.07 - 0.15</td>
                                <td class="table-info">0.15 - 0.38</td>
                                <td class="table-warning">0.38 - 0.45</td>
                                <td class="table-danger">0.45 - 0.9</td>
                            </tr>
                            <tr style="color:white;">


                                @foreach($wears as $wear)
                                    <td>
                                    {{$wear->steamPrice}}
                                    </td>
                                @endforeach

                            </tr>
                            <tr class="bg-primary" style="color:white;">
                                @foreach($wears as $wear)
                                    <td><a href="https://steamcommunity.com/market/listings/730/{{$wear->market_hash_name}}}"><i class="far fa-eye"></i></a></td>
                                @endforeach

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h5 style="padding-top:2vh;">Tradeup potentials</h5>
                    <div  style="margin-top:3vh" class="row skinsFromCollection">
                        @foreach($tradeUps as $tradeup)
                        <a href="/item/{{$tradeup->id}}" class="col-4"><div style="border-bottom-color: rgb(235, 75, 75);"class="skin">
                                <img class="col-12"src="{{$tradeup->image}}"/>
                                <h6>{{$tradeup->weapon_name." | ".$tradeup->skin_name}}</h6>
                            </div> </a>
                       @endforeach
                    </div>

                    <h5 style="padding-top:5vh;">Other skins from this collection</h5>

                    <div style="margin-top:3vh" class="row skinsFromCollection">
                        @foreach($collectionItems as $collectionItem)
                        <a href="/item/{{$collectionItem->id}}" class="col-3">  <div style="border-bottom-color: rgb(235, 75, 75);"class="skin">
                                <img class="col-12"src="{{$collectionItem->image}}"/>
                                <h6>{{$collectionItem->weapon_name." | ".$collectionItem->skin_name}}</h6>
                            </div> </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
