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
    public function updateSkinDatabase(Request $request){
        if ($request->isMethod('post')) {
            $code = $request->input('code');
            $json = json_decode(file_get_contents('https://bitskins.com/api/v1/get_all_item_prices/?api_key='.env("BITSKINS_API_KEY", "AUTO").'&code='.$code.'&app_id=730.json'),true);
            $allitems=$json['prices'];
            foreach ($allitems as $itemDetails){
                $itemhashname=$itemDetails["market_hash_name"];
                $itemfullname=$itemhashname;
                $itemicon=$itemDetails["icon_url"];
                $gunFullName=explode(" | ",$itemhashname);
                $gunName=$gunFullName[0];
                $skinName=null;
                if(count($gunFullName)>1){
                    $skinFullName=explode(" (",$gunFullName[1]);
                    $skinName=$skinFullName[0];
                }

                if($skinName!=null && $gunName!=null){
                    $skinParent = Item::where('weapon_name', '=', $gunName)->where('skin_name', '=', $skinName)->first();
                    if(isset($skinParent) && $skinParent->image==null){
                        $skinParent->image=$itemicon;
                        $skinParent->save();
                    }
                    if($skinParent!=null){
                        $item=new item_wear();
                        $item->market_hash_name=$itemhashname;
                        $item->image=$itemicon;
                        $item->skin_id=$skinParent->id;
                        $item->steamPrice=$itemDetails["price"];
                        $item->bitskinsPrice=$itemDetails["price"];
                        $item->steamLink="https://steamcommunity.com/market/listings/730/".$itemhashname;
                        $item->save();
                    }


                }
                $skinParent2 = itemcollection::where('name', '=', $itemfullname)->first();
                if(isset($skinParent2) && $skinParent2->image==null){
                    $skinParent2->image=$itemDetails["icon_url"];
                    $skinParent2->save();
                }
            }
            return ("updated bitskins");

        }
        $this->index();
    }
    public function getJson(){
        for($i=1;$i<4;$i+=1){
            $jsonString = file_get_contents(base_path('resources/lang/items'.$i.'.json'));
            $data = json_decode($jsonString, true);
            foreach ($data as $collectionData){
                $count = itemcollection::where('name', '=', $collectionData[0])->count();
                if($count==0){
                    $collection=new itemcollection();
                    $collection->name=$collectionData[0];
                    $collection->save();
                }else{
                    $collectionId = itemcollection::where('name', '=', $collectionData[0])->first();
                    if($collectionId!=null){
                        $item=new Item();
                        $item->weapon_name=$collectionData[1];
                        $item->skin_name=$collectionData[2];
                        $item->rarity=$collectionData[3];
                        $item->collection_id=$collectionId->id;
                        $item->save();
                    }
                }
            }
        }
        return ("updated");
    }
}
