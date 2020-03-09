<?php


namespace App\repositories;


use App\Item;
use App\item_wear;

class ItemRepository
{

    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function all()
    {
        return $this->item->simplepaginate(20);
    }
    public function findItemFromInventory($id)
    {
        return $item=Item::where('id', '=', $id)->get();
    }
    public function search($query)
    {
        return $skins= Item::where('skin_name','like',"%$query%")->simplepaginate(20);
    }
    public function insert(Item $item)
    {
        $item->save();
    }

    public function find($id)
    {
        return $item=Item::where('items.id', '=', $id)->rightJoin('itemcollections', 'itemcollections.id', '=', 'items.collection_id')->first();
    }

    public function getWears($id)
    {
        return $wears= item_wear::where('skin_id','=',$id)->get();
    }
    public function getSkinsByCollection($id)
    {
        return $items= Item::where('collection_id','=',$id)->get();
    }
    public function getTradeUps($id,$itemData)
    {
        return $tradeUps=Item::where([['collection_id', '=', $itemData->collection_id], ['rarity','=',"$itemData->rarity"],['skin_name','!=',$itemData->skin_name]])->get();
    }
    public function getSkinsFromCollection($itemCollection)
    {
        return $tradeUps=Item::where('collection_id', '=', $itemCollection)->get();
    }

}
