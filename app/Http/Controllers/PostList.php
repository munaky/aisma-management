<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostList extends Controller
{
    public function __invoke(Request $req, $action)
    {
        if (method_exists($this, $action)) {
            return $this->$action($req);
        } else {
            return Etc::errView(404);
        }
    }

    private function history(Request $req){
        $input = $req->all();

        $serial =  1;

        $latest_history = $this->models['history']::orderBy('id', 'desc')->first();

        if($latest_history !== null){
            $serial = intval($latest_history->serial_number);
        }

        $history = $this->models['history']::create([
            'client' => $input['client'],
            'director' => $input['director'],
            'manager' => $input['manager'],
            'contact' => $input['contact'],
            'sent_via' => $input['sent_via'],
            'driver_name' => $input['driver_name'] ?? '',
            'serial_number' => str_pad($serial, 4, '0', STR_PAD_LEFT),
            'serial_desc' => '/SJ-NAP.PT/VI/' . date('Y'),
            'total' => $input['total'],
            'total_word' => $input['total_word'],
            'date' => date('m F Y'),
            'date_start' => date('Ymd'),
        ]);

        $products = array_map(function ($i) use ($history) {
            return [
                'histories_id' => $history->id,
                'products_id' => $i['id'],
                'amount' => $i['amount'],
                'price' => $i['price'] * $i['amount'],
            ];
        }, session()->get('list'));

        $this->models['product_history']::insert($products);

        session()->forget('list');

        return back();
    }

    private function edit(Request $req){
        $input = $req->all();

        session()->put('list', array_map(function ($i) use ($input){
            if($i['id'] == $input['id']){
                $i['amount'] = $input['amount'];
                $i['total'] = $i['price'] * $input['amount'];
            }

            return $i;
        }, session()->get('list')));

        return back();
    }

    private function delete(Request $req){
        $input = $req->all();

        session()->put('list', array_filter(session()->get('list'), function ($i) use ($input) {
            return $i['id'] != $input['id'];
        }));

        return back();
    }
}
