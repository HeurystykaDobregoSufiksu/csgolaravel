<?php

namespace App\Http\Controllers;
//use Request;
use Illuminate\Http\Request;
use App\Item;
use App\itemcollection;
use App\item_wear;
use mysql_xdevapi\Exception;

use App\Http\Requests\ItemRequest;
use App\Services\ItemService;

use phpDocumentor\Reflection\Types\Collection;


use function GuzzleHttp\Promise\all;

class itemsController extends Controller
{
    private $itemservice;

    public function __construct(ItemService $itemservice)
    {
        $this->itemservice = $itemservice;
    }
    public function index(Request $request){
            $itemname = $request->input('q');
            if ($itemname!=null)
            {
                $skins = $this->itemservice->search($itemname);

            }else{
                $skins = $this->itemservice->index();
            }

        return view('skins', compact('skins'));
    }


    public function show($id){
        $item = $this->itemservice->getItemdata($id);
        $wears= $this->itemservice->getAllWears($id);
        $tradeUps= $this->itemservice->getAllTradeUps($id,$item);
        $collectionItems= $this->itemservice->getSkinsFromSameCollection($item->collection_id);

        return view('skin', ["item"=>$item,"wears"=>$wears,"tradeUps"=>$tradeUps,"collectionItems"=>$collectionItems]);
    }


    public function updateSkinDatabase(Request $request){
        if ($request->isMethod('post')) {
            $code = $request->input('code');
            $this->itemservice->updateSkinsBitskins($code);

        }
        $this->index();
    }

    public function getJson(){
        $this->itemservice->updateSkinsJson();
        return ("updated");
    }

}
