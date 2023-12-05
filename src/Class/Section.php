<?php
namespace Techtree\MaplecmsClient\Class;

use Techtree\MaplecmsClient\Http\Controllers\ApiController;

class Section
{
    public $name;
    public $tag;
    public $groups = [];

    public function __construct($rawSection)
    {
        $this->name = $rawSection['name'];
        $this->tag = $rawSection['tag'];
        $this->groups = $this->createGroups($rawSection['groups']);
    }


    private function createGroups($rawGroups)
    {
        $groups = collect();

        foreach($rawGroups as $rawGroup){
            $group = new ContentGroup($rawGroup);
            $groups->push($group);
        }

        return $groups;
    }

}
