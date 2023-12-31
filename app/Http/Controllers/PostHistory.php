<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostHistory extends Controller
{
    public function __invoke(Request $req, $action)
    {
        if (method_exists($this, $action)) {
            return $this->$action($req);
        } else {
            return Etc::errView(404);
        }
    }

    private function edit(Request $req)
    {
        $input = $req->all();

        $this->models['history']::find($input['id'])
            ->update(['status_id' => $input['status_id']]);

        return back();
    }

    private function delete(Request $req){
        $input = $req->all();

        $this->models['history']::find($input['id'])->delete();

        return back();
    }
}
