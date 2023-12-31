<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Document extends Controller
{
    public function __invoke(Request $req, $type, $id)
    {
        if (method_exists($this, $type)) {
            return $this->$type($id);
        } else {
            return Etc::errView(404);
        }
    }

    private function invoice($id){
        $data = $this->models['history']::with('products.detail')->find($id);

        $data->products = array_map(function ($i){

            $data = [
                'name' => $i['detail']['name'],
                'unit' => $i['detail']['unit'],
                'amount' => $i['amount'],
                'total' => Etc::idr($i['price'] * $i['amount']),
                'price' => Etc::idr($i['detail']['price']),
            ];

            return $data;
        }, $data->products->toArray());

        info($data);

        return view('document.invoice', ['data' => $data]);
    }

    private function surat_jalan($id){
        $data = $this->models['history']::with('products.detail')->find($id);

        return view('document.surat_jalan', ['data' => $data]);
    }
}
