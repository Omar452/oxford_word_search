<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    private $apiKey;
    private $id;
    private $url;
    private $language;

    public function __construct(){
        $this->apiKey = "0e83be917efcaf3bd007d76f80f44c10";
        $this->id = "cb3f1b23";
        $this->url = "https://od-api.oxforddictionaries.com:443/api/v2/entries/";
        $this->language = "en-gb/";
    }

    public function search(Request $request){

        $request->validate([
            'search' => 'required|string|min:2|max:50|alpha'
        ]);

        $client = new Client();
        $response = $client->get($this->url . $this->language . $request->search, [
            'headers' => [
                'app_id' => $this->id,
                "app_key" => $this->apiKey
            ],
            'verify' => false
        ]);

        $data = json_decode($response->getBody());
        
        return view('welcome', ['data' => $data]);

    }
    
}