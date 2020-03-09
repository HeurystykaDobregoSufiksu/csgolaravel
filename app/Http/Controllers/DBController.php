<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use App\item_wear;
use App\itemcollection;


class DBController extends Controller
{
    public function getupdatepage(){
        return view('updateform');
    }
    
}
