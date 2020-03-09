<?php

namespace App\Http\Controllers;


use App\Services\PostService;
use Illuminate\Http\Request;
use App\Http\Requests\itemcollectionRequest;
use App\Services\CollectionService;
use App\Http\Requests\ItemRequest;
use App\Services\ItemService;

class collectionsController extends Controller
{
    protected $collectionService;
    protected $itemService;
    public function __construct(CollectionService $collectionService, ItemService $itemService)
    {
        $this->itemService=$itemService;
        $this->collectionService = $collectionService;
    }
    public function index(){
        $cases = $this->collectionService->index();
        return view('index', compact('cases'));
    }

    public function show(Request $request, $id){
        $case = $this->collectionService->getCollectiondata($id);
        $items= $this->itemService->getSkinsByCollection($case->id);
        return view('case', ["case"=>$case,'items'=>$items]);
    }
}
