<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\itemcollection;
class collectionsController extends Controller
{
    public function index(){
        $cases= itemcollection::where('image', '!=', null)->simplepaginate(20);
        return view('index', ["cases"=>$cases]);
    }

    public function show(Request $request, $id){
        if (itemcollection::where('id', '=', $id)->exists()) {
            $case=itemcollection::where('id', '=', $id)->first();
            $items= Item::where('collection_id','=',$case->id)->get();
        }else{
            abort(404);
        }
        return view('case', ["case"=>$case,'items'=>$items]);
    }
}
