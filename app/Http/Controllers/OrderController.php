<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $orders = Order::with(['user', 'item'])->orderBy('date', 'desc')->get();

        return view('dashboard.orders.index', [
            'orders' => $orders,
            // 'users' => User::all(),
            // 'items' => Item::all(),
            'title' => 'Orders'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.orders.create', [
            'title' => 'Orders',
            'orders' => Order::all(),
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
            'customer' => 'required|max:20',
            'quantity' => 'required|integer|min:1|max:100',
            'price_item' => 'required|integer|min:1000|max:10000000',
            'total' => 'required|integer|min:1000|max:50000000',
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

        Order::create($validatedData);

        return redirect('/dashboard/orders')->with('success', 'Data is successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('dashboard.orders.show', [
            'order' => $order,
            'title' => 'Orders',
            'item' => Item::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('dashboard.orders.edit', [
            'order' => $order,
            'title' => 'Orders',
            'items' => Item::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $rules = [
            'item_id' => 'required',
            'date' => 'required|date',
            'customer' => 'required|max:20',
            'quantity' => 'required|integer|min:1|max:100',
            'price_item' => 'required|integer|min:1000|max:10000000',
            'total' => 'required|integer|min:1000|max:50000000',
            'payment' => 'required'
        ];

        $validatedData = collect($request->validate($rules))->filter()->all();

        // Mengambil nilai quantity dari model Order sebelum pembaruan
        $previousQuantity = $order->quantity;

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

        $order->update($validatedData);

        return redirect('/dashboard/orders')->with('success', 'Data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return back()->with('success', 'Data is successfully deleted!');
    }
}
