<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'names.*' => 'required|string',
            'quantities.*' => 'required|integer',
            'prices.*' => 'required|numeric',
        ]);

        foreach (array_map(null, $request->names, $request->quantities, $request->prices) as $data) {
            $item = new Item([
                'name' => $data[0],
                'quantity' => $data[1],
                'price' => $data[2],
            ]);
            $item->save();
        }

        return redirect()->route('items.create')->with('success', 'Items created successfully!');
    }

}
