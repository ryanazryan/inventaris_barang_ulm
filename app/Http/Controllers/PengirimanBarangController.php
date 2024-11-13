<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PengirimanBarang;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class PengirimanBarangController extends Controller
{
    /**
     * Kirim barang dari satu ruangan ke ruangan lain.
     */

    public function index()
    {
        $pengirimanBarang = PengirimanBarang::all();

        return view('layouts.pengiriman_barang.partials.index', compact('pengirimanBarang'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'ruangan_pengirim_id' => 'required|exists:ruangan,id',
            'ruangan_penerima_id' => 'required|exists:ruangan,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::find($request->barang_id);

        if ($barang && $barang->jumlah >= $request->jumlah) {
            $barang->jumlah -= $request->jumlah;
            $barang->save();

            PengirimanBarang::create([
                'barang_id' => $request->barang_id,
                'ruangan_pengirim_id' => $request->ruangan_pengirim_id,
                'ruangan_penerima_id' => $request->ruangan_penerima_id,
                'jumlah' => $request->jumlah,
                'status' => 'Pending',
            ]);

            return redirect()->route('transaksi.index')->with('success', 'Barang berhasil dikirim.');
        } else {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }
    }


    public function kirimBarang(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'ruangan_pengirim_id' => 'required|exists:ruangan,id',
            'ruangan_penerima_id' => 'required|exists:ruangan,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = Barang::where('id', $request->barang_id)
            ->where('ruangan_id', $request->ruangan_pengirim_id)
            ->first();

        if ($barang && $barang->jumlah >= $request->jumlah) {
            $barang->jumlah -= $request->jumlah;
            $barang->save();

            PengirimanBarang::create([
                'barang_id' => $request->barang_id,
                'ruangan_pengirim_id' => $request->ruangan_pengirim_id,
                'ruangan_penerima_id' => $request->ruangan_penerima_id,
                'jumlah' => $request->jumlah,
                'status' => 'Pending',
            ]);

            return redirect()->route('pengirimanBarang.index')->with('success', 'Barang berhasil dikirim.');
        } else {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
        }
    }
}
