<?php

namespace App\Http\Controllers;

use App\Models\PpobAccount;
use App\Models\PpobCategory;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AkunPulsaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bank view')->only('index', 'show');
        $this->middleware('permission:bank create')->only('create', 'store');
        $this->middleware('permission:bank edit')->only('edit', 'update');
        $this->middleware('permission:bank delete')->only('destroy');
    }

    public function akun()
    {
        $apiToken = PpobAccount::select('api_token')->get()->first()->api_token;

        $client = new Client();
        $url = "https://api.serpul.co.id/account";

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
        $data1      = $data['responseData'];

        return view('pulsa.akun', compact('data1'));
    }
}
