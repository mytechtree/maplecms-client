<?php
namespace Techtree\MaplecmsClient\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
class ApiController extends Controller
{
    private $apiUrl = 'https://maplecms.test/api/';
    private $apiId,$apiSecret,$sslVerify;
    public function __construct()
    {
        $this->apiId = config('maplecms.api_id');
        $this->apiSecret = config('maplecms.api_secret');
        $this->sslVerify = config('maplecms.ssl_verify');
    }

    public function getPage($tag)
    {
        $response = $this->sendRequest('website/get-page',['tag' => $tag]);
        return json_decode($response,true);
    }

    private function sendRequest($uri,$formParams = null)
    {
        $endpoint = $this->apiUrl.$uri;

        $request = Http::accept('application/json')
            ->withHeaders([
                'x-api-id' => $this->apiId,
                'x-api-secret' => $this->apiSecret,
            ]);

        if(!$this->sslVerify){
            $request->withoutVerifying();
        }

        if($formParams){
            $request->asForm();
            return $request->post($endpoint,$formParams);
        }

        return $request->post($endpoint);
    }
}
