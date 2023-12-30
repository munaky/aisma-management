<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostEmployee extends Controller
{
    public function __invoke(Request $req, $action)
    {
        if (method_exists($this, $action)) {
            return $this->$action($req);
        } else {
            return Etc::errView(404);
        }
    }

    private function add(Request $req)
    {
        $input = $req->all();

        $card = $card = $this->models['card']::firstOrCreate(['uid' => $input['card_uid']]);

        $this->models['employee']::create([
            'name' => $input['name'],
            'role_id' => $input['role_id'],
            'cards_id' => $card->id,
        ]);

        return back();
    }

    private function edit(Request $req)
    {
        $input = $req->all();

        $card = $card = $this->models['card']::firstOrCreate(['uid' => $input['card_uid']]);

        $this->models['employee']::find($input['id'])
            ->update([
                'name' => $input['name'],
                'role_id' => $input['role_id'],
                'cards_id' => $card->id,
            ]);

        return back();
    }

    private function delete(Request $req)
    {
        $input = $req->get('id');

        $this->models['employee']::find($input)->delete();

        return back();
    }
}
