<?php
namespace Techtree\MaplecmsClient\Class;

class ContentGroup
{
    private $raw;
    public $name;
    public $tag;
    public $contents = [];
    public $itemSets = [];

    public function __construct($raw)
    {
        $this->name = $raw['name'];
        $this->tag = $raw['tag'];
        $this->contents = $this->createContents($raw['contents']);
        $this->itemSets = $this->createItemSets($raw['item-sets']);
    }


    private function createContents($rawContents)
    {
        $contents = collect();

        foreach($rawContents as $rawContent){
            $content = new Content($rawContent);
            $contents->push($content);
        }

        return $contents;
    }

    private function createItemSets($rawItemSets)
    {
        $itemSets = collect();

        foreach($rawItemSets as $rawItemSet){
            $itemSet = new ItemSet($rawItemSet);
            $itemSets->push($itemSet);
        }

        return $itemSets;
    }


}
