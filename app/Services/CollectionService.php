<?php


namespace App\Services;


use App\Repositories\CollectionRepository;


class CollectionService
{
    public function __construct(CollectionRepository $collection)
    {
        $this->collection = $collection ;
    }

    public function index()
    {
        return $this->collection->all();
    }

    public function getCollectiondata($id)
    {
        return $this->collection->getCollectionData($id);
    }

}
