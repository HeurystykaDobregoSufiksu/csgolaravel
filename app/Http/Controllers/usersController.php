<?php

namespace App\Http\Controllers;

use App\User;
use App\item_wear;
use App\inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class usersController extends Controller
{
    public function show(){
            $user = Auth::user();
            if($user!=null){
                $itemdata=inventory::where('user_id','=',$user->id)->leftJoin('item_wears', 'item_wears.id', '=', 'inventories.item_id')->get();
                if(!count($itemdata)){
                    $this->refreshInventory();
                    $itemdata=inventory::where('user_id','=',$user->id)->rightJoin('item_wears', 'item_wears.skin_id', '=', 'inventories.item_id')->get();
                }
                return view('profile',['userdata'=>$user,'items'=>$itemdata]);
            }else{
                return ("zaloguj sie");
            }
    }

    public function refreshInventory(){
        $user = Auth::user();
        if($user!=null){
            inventory::where('user_id', '=', $user->id)->delete();
            $userinv=json_decode(file_get_contents('https://steamcommunity.com/inventory/'.$user->steamid.'/730/2?l=english&count=500.json'),true);
            $userinv=$userinv['descriptions'];
            foreach ($userinv as $item) {
                $itemdata=item_wear::where('market_hash_name','=',$item['market_hash_name'])->first();
                if($itemdata!=null){
                    $inventoryitem=new inventory();
                    $inventoryitem->user_id=$user->id;
                    $inventoryitem->item_id=$itemdata->id;
                    $inventoryitem->save();
                }
            }
        }
        $this->show();
    }

    public function logged(){
        return view('index');
    }


}
