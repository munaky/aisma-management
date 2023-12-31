<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostProduct extends Controller
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
        $input = $req->except(['image']);
        $image = $req->file('image');

        if ($req->has('image')) {
            $image = $req->file('image');
            $filename = uniqid() . time() . '.' . $image->extension();
            $path = $image->storeAs('images', $filename, 'public');
        }

        $this->models['product']::create([
            'image' => $req->has('image') ? 'storage/' . $path : 'storage/images/default.png',
            'name' => $input['name'],
            'size' => $input['size'],
            'unit' => $input['unit'],
            'stock' => $input['stock'],
            'price' => $input['price'],
            'description' => $input['description']
        ]);

        return back();
    }

    private function edit(Request $req)
    {
        $input = $req->except(['image']);

        /* Image */
        if ($req->has('image')) {
            $image = $req->file('image');
            $filename = uniqid() . time() . '.' . $image->extension();
            $path = $image->storeAs('images', $filename, 'public');
        }

        $this->models['product']::find($input['id'])
            ->update([
                'image' => $req->has('image') ? 'storage/' . $path : $input['path'],
                'name' => $input['name'],
                'size' => $input['size'],
                'unit' => $input['unit'],
                'stock' => $input['stock'],
                'price' => $input['price'],
                'description' => $input['description']
            ]);

        return back();
    }

    private function delete(Request $req)
    {
        $input = $req->get('id');

        $this->models['product']::find($input)->delete();

        return back();
    }

    private function list(Request $req)
    {
        $input = $req->all();

        $list = session()->get('list') ?? [];

        $product = $this->models['product']::find($input['id']);

        if($product->stock - $input['amount'] < 0){
            return back();
        }

        array_push($list, [
            'id' => $input['id'],
            'name' => $product->name ?? null,
            'unit' => $product->unit ?? null,
            'price' => $product->price ?? 0,
            'amount' => $input['amount'],
            'total' => $product->price * $input['amount'],
        ]);

        session()->put('list', $list);

        info(session()->get('list'));

        return back();
    }
}
