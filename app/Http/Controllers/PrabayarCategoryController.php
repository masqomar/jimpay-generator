<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrabayarCategoryRequest;
use App\Models\PpobAccount;
use App\Models\PrabayarCategory;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PrabayarCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:ppob account view')->only('index', 'show');
        $this->middleware('permission:ppob account create')->only('create', 'store');
        $this->middleware('permission:ppob account edit')->only('edit', 'update');
        $this->middleware('permission:ppob account delete')->only('destroy');
    }

    public function index()
    {
        $apiToken = PpobAccount::select('api_token')->get()->first()->api_token;

        $client = new Client();
        $url = "https://api.serpul.co.id/prabayar/category";

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

        foreach ($data as $categoryPrabayar) {
            $hasil = $categoryPrabayar;
        }

        // return json_encode($categoryPrabayar);

        return view('pulsa.kategori', compact('hasil'));
    }

    public function store(StorePrabayarCategoryRequest $request)
    {
        // dd($request->all());
        $product_id = $request->product_id;
        $product_name = $request->product_name;
        $status = $request->status;
        $update = $request->update;

        foreach ($product_id as $key => $idProduct) {
            $input['product_id'] = $idProduct;
            $input['product_name'] = $product_name[$key];
            $input['status'] = $status[$key];
            $input['update'] = $update[$key];

            $check = PrabayarCategory::where('product_id', $idProduct)->first();
            if ($check == null) {
                PrabayarCategory::create($input);
            } else {
                $check->fill($input)->save();
            }
            // PrabayarCategory::create($input);
        }


        return redirect()->back()->with(['message' => 'Berhasil di update']);
    }
}
