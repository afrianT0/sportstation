<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.items.index', [
            'items' => Item::all(),
            'title' => 'Items'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.items.create', [
            'title' => 'Items',
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required',
            'name' => 'required|unique:items|max:50',
            'stock' => 'required|integer|min:1|max:100',
            'price_item' => 'required|integer|min:1000|max:10000000',
            'price_day' => 'required|integer|min:1000|max:10000000'
        ]);

        // dd($validatedData);

        Item::create($validatedData);

        return redirect('/dashboard/items')->with('success', 'Data is successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('dashboard.items.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('dashboard.items.edit', [
            'item' => $item,
            'items' => Item::all(),
            'title' => 'Items'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'category' => 'required',
            'name' => 'required|unique:items,name,' . $item->id . '|max:50',
            'stock' => 'required|integer|min:1|max:100',
            'price_item' => 'required|integer|min:1000|max:10000000',
            'price_day' => 'required|integer|min:1000|max:10000000'
        ];

        $validatedData = collect($request->validate($rules))->filter()->all();

        // dd($validatedData);

        $item->update($validatedData);

        return redirect('/dashboard/items')->with('success', 'Data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect('/dashboard/items')->with('success', 'Data is successfully deleted!');
    }

    public function json(Item $item)
    {
        return response()->json($item);
    }
}
