<?php

namespace App\Http\Controllers;
use Auth;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use App\Http\Requests\inventoryRequest;
use App\Services\InventoryService;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;


class usersController extends Controller
{
    protected $userService;
    protected $inventoryService;
    protected $itemservice;
    public function __construct(UserService $userService, InventoryService $inventoryService, ItemService $itemservice)
    {
        $this->userService=$userService;
        $this->itemservice=$itemservice;
        $this->inventoryService=$inventoryService;
    }
    public function show(){
        $user = $this->userService->getUserData();
        $inventory = $this->inventoryService->getInventory();
        $inventoryItems = $this->itemservice->getInventoryItems($inventory);
        return view('profile',['userdata'=>$user,'inventory'=>$inventory,'inventoryItems'=>$inventoryItems]);

    }
    public function refreshInventory(){
        $inventory = $this->inventoryService->refreshInventory();
        $this->show();
    }


    public function logged(){
        return view('index');
    }


}
