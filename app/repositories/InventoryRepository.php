<?php


namespace App\repositories;
use App\inventory;
use Auth;
class InventoryRepository
{
    protected $inventory;

    public function __construct(inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    public function getUserInventory()
    {
        return inventory::where('user_id', '=', Auth::user()->id)->get();
    }
    public function deleteInventory()
    {
        return inventory::where('user_id', '=', Auth::user()->id)->delete();
    }


}
