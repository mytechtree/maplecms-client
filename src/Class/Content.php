<?php
namespace Techtree\MaplecmsClient\Class;

class Content
{
    public $name;
    public $tag;
    public $type;
    public $value;
    public function __construct($raw)
    {
        $this->name = $raw['name'];
        $this->tag = $raw['tag'];
        $this->type = $raw['type'];
        $this->value = $raw['value'];
    }
}
