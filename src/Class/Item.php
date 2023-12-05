<?php
namespace Techtree\MaplecmsClient\Class;

class Item
{
    public $contents = [];

    public function __construct($raw)
    {
        $this->contents = $this->createContents($raw['contents']);
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
}
