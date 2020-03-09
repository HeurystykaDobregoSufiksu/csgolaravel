<?php


namespace App\Services;

use Auth;
use App\Repositories\InventoryRepository;
use App\item_wear;
use App\inventory;

class InventoryService
{
    public function __construct(InventoryRepository $inventory)
    {
        $this->inventory = $inventory;
    }
    public function getInventory()
    {
        return $this->inventory->getUserInventory();
    }
    public function deleteInventory()
    {
        return $this->inventory->deleteInventory();
    }
    public function refreshInventory(){
            $this->inventory->deleteInventory();
            $userinv=json_decode(file_get_contents('https://steamcommunity.com/inventory/'.Auth::user()->steamid.'/730/2?l=english&count=500.json'),true);
            $userinv=$userinv['descriptions'];
            foreach ($userinv as $item) {
                $itemdata=item_wear::where('market_hash_name','=',$item['market_hash_name'])->first();
                if($itemdata!=null){
                    $inventoryitem=new inventory();
                    $inventoryitem->user_id=Auth::user()->id;
                    $inventoryitem->item_id=$itemdata->id;
                    $inventoryitem->save();
                }
            }


    }


}
