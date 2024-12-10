<?php

namespace App\Http\Controllers;

use App\Models\Arts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtController extends Controller
{
    public function index()
    {
        $arts = Arts::all();
        return view('admin.arts.index', compact('arts'));
    }

    public function create()
    {
        return view('admin.arts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10000',
        ]);

        $path = $request->file('image')->store('arts', 'public');

        Arts::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $path,
        ]);

        return redirect()->route('arts.index')->with('success', 'Karya seni berhasil ditambahkan!');
    }

    public function show($id)
    {
        // Menampilkan lukisan berdasarkan ID
        $art = Arts::findOrFail($id);
        return view('admin.arts.show', compact('art'));
    }


    public function edit(Arts $art)
    {
        return view('admin.arts.edit', compact('art'));
    }

    public function update(Request $request, Arts $art)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($art->image) {
                Storage::disk('public')->delete($art->image);
            }
            $path = $request->file('image')->store('arts', 'public');
            $art->image = $path;
        }

        $art->update($request->only(['name', 'description', 'price']));

        return redirect()->route('arts.index')->with('success', 'Karya seni berhasil diperbarui!');
    }

    public function destroy(Arts $art)
    {
        if ($art->image) {
            Storage::disk('public')->delete($art->image);
        }

        $art->delete();

        return redirect()->route('arts.index')->with('success', 'Karya seni berhasil dihapus!');
    }

    public function cart()
    {
        return view('admin.arts.keranjang');
    }

    public function addToCart(Request $request, $id)
    {
        $art = Arts::findOrFail($id);

        // Ambil keranjang dari sesi atau buat baru
        $cart = session()->get('cart', []);

        // Jika item sudah ada, tambahkan jumlah
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika item baru, tambahkan ke keranjang
            $cart[$id] = [
                'id' => $art->id,
                'name' => $art->name,
                'price' => $art->price,
                'image' => $art->image,
                'description' => $art->description,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Karya seni berhasil dimasukkan ke keranjang!');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang!');
    }


}
