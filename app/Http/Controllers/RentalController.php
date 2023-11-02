<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::with(['user', 'item'])->orderBy('date', 'desc')->get();

        return view('dashboard.rentals.index', [
            'rentals' => $rentals,
            'title' => 'Rental'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rentals.create', [
            'title' => 'Rental',
            'rentals' => Rental::all(),
            'items' => Item::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'item_id' => 'required',
            'date' => 'required|date',
            'customer' => 'required',
            'quantity' => 'required|integer|min:1',
            'day' => 'required|integer|min:1',
            'price_day' => 'required|integer',
            'total' => 'required|integer',
            'payment' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        // Mengurangkan stok produk
        $item = Item::find($validatedData['item_id']);

        // Validasi stok produk
        if ($item->stock < $validatedData['quantity']) {
            throw ValidationException::withMessages(['quantity' => 'Stock not available.']);
        }

        // Mengurangkan stok produk
        $item->stock -= $validatedData['quantity'];
        $item->save();

        // dd($validatedData);

        Rental::create($validatedData);

        return redirect('/dashboard/rentals')->with('success', 'Data is successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        return view('dashboard.rentals.show', [
            'rental' => $rental,
            'title' => 'Rental',
            'item' => Item::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        return view('dashboard.rentals.edit', [
            'rental' => $rental,
            'title' => 'Rental',
            'items' => Item::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        $rules = [
            'item_id' => 'required',
            'date' => 'required|date',
            'customer' => 'required',
            'quantity' => 'required|integer|min:1',
            'day' => 'required|integer|min:1',
            'price_day' => 'required|integer',
            'total' => 'required|integer',
            'payment' => 'required'
        ];

        $validatedData = collect($request->validate($rules))->filter()->all();

        // Mengambil nilai quantity dari model Rental sebelum pembaruan
        $previousQuantity = $rental->quantity;

        // Mengurangkan stok produk
        $item = Item::find($validatedData['item_id']);

        // Validasi stok produk
        if ($item->stock < $validatedData['quantity']) {
            throw ValidationException::withMessages(['quantity' => 'Stock not available.']);
        }

        // Mengurangkan stok produk
        // $item->stock -= $validatedData['quantity'];
        $item->stock += $previousQuantity - $validatedData['quantity'];
        $item->save();

        // dd($validatedData);

        $rental->update($validatedData);

        return redirect('/dashboard/rentals')->with('success', 'Data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();

        return back()->with('success', 'Data is successfully deleted!');
    }
}
