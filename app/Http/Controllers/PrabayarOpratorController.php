<?php

namespace App\Http\Controllers;

use App\Models\PpobAccount;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PrabayarOpratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:deviden view')->only('index');
    }

    public function getProductId(Request $request)
    {
        $apiToken = PpobAccount::select('api_token')->get()->first()->api_token;

        $client = new Client();
        $url = "https://api.serpul.co.id/prabayar/operator?product_id=PIU";

        $params = [
            //If you have any Params Pass here
        ];

        $headers = [
            'Accept' => 'application/json',
            'Authorization' => $apiToken
        ];

        $response = $client->request('GET', $url, [
            // 'json' => $params,
            'headers' => $headers,
            'verify'  => false,
        ])->getBody()->getContents();

        $data = json_decode($response, true);

        foreach ($data as $opeartorPrabayar) {
            $hasil = $opeartorPrabayar;
        }

        return json_encode($hasil);

        return view('pulsa.operator', compact('hasil'));
    }
}
