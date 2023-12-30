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
}
