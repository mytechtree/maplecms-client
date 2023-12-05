<?php
namespace Techtree\MaplecmsClient\Class;
use Illuminate\Support\Collection;
use Techtree\MaplecmsClient\Http\Controllers\ApiController;
class Page{
    public $raw;
    public $name;
    public $tag;
    public $metas = [];
    public $contents = [];

    public function __construct($tag)
    {
        $apiController = new ApiController();
        $this->raw = $apiController->getPage($tag);
        $this->name = $this->getPageName();
        $this->tag = $this->getPageTag();
        $this->metas = $this->getMetas();
        $this->contents = $this->getContents();
    }

    public function generateMetaHtml($position = 'head-first')
    {
        $html = '';

        foreach($this->metas as $meta){
            $html = $html.$meta['value'];
        }

        return $html;
    }

    private function getPageName()
    {
        $data = $this->extractData($this->raw);
        return $data['name'];
    }

    private function getPageTag()
    {
        $data = $this->extractData($this->raw);
        return $data['tag'];
    }

    private function getMetas()
    {
        $data = $this->extractData($this->raw);
        return collect($data['meta']);
    }

    private function getContents()
    {
        $data = $this->extractData($this->raw);
        return $this->createContents($data['sections']);

    }

    private function extractData($raw)
    {
        $data = $raw['data'];
        return $data;
    }

    private function createContents($rawSections)
    {
        $sections = collect();

        foreach($rawSections as $section){
            $section = new Section($section);
            $sections->push($section);
        }

        return $sections;
    }

}
