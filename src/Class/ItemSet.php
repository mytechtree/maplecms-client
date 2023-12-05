<?php
namespace Techtree\MaplecmsClient\Class;

class ItemSet
{
    public $name;
    public $tag;
    public $items = [];

    public function __construct($raw)
    {
        $this->name = $raw['name'];
        $this->tag = $raw['tag'];
        $this->items = $this->createItems($raw['items']);
    }

    private function createItems($rawItems)
    {
        $items = collect();

        foreach($rawItems as $rawItem){
            $item = new Item($rawItem);
            $items->push($item);
        }

        return $items;
    }
}
