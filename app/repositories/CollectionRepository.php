<?php


namespace App\repositories;
use App\itemcollection;

class CollectionRepository
{
    protected $collection;

    public function __construct(itemcollection $post)
    {
        $this->collection = $post;
    }

    public function all()
    {
        return itemcollection::where('image','!=',null)->get();
    }

    public function getCollectionData($id)
    {
        return itemcollection::where('id', '=', $id)->first();
    }

}
