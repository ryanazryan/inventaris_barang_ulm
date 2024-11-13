<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BarangController extends Controller
{
    use AuthorizesRequests; 

    

    /** 
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = Auth::user();
        $ruangan_id = $pengguna->ruangan_id;

        // Tampilkan barang hanya dari ruangan yang sama dengan pengguna
        $barang = Barang::where('ruangan_id', $ruangan_id)->get();

        return view('layouts.barang.partials.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Barang::class);
        return view('layouts.barang.partials.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        $this->authorize('create', Barang::class);

        $user = Auth::user();

        $user->ruangan->barang()->create([
            'kode_barang' => $request->kode_barang,
            'nama' => $request->nama,
            'merk' => $request->merk,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'tipe_jumlah' => $request->tipe_jumlah,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }




    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        $this->authorize('view', $barang);
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $this->authorize('update', $barang);
        return view('layouts.barang.partials.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        $this->authorize('update', $barang);

        $barang->update($request->only(['kode_barang', 'nama', 'merk', 'harga', 'jumlah', 'tipe_jumlah']));

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $this->authorize('delete', $barang);

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
