<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\User;
use App\Operator;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = $request->input('tanggal', date("Y-m-d"));

        $transaksi = Transaksi::with('user', 'operator')->where('tanggal', $tanggal)->get();

        return view('daftarpenyewa', compact('transaksi', 'tanggal'), ['operator_nama' => $request->session()->get('nama')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namaoperator = $request->input('nama_operator');
        $operator = Operator::where('nama', $namaoperator)->first();

        foreach ($request->input('kode_lapangan', []) as $i => $lapangan) {
            $userfdb = User::firstOrCreate(
                ['nama' => $request->input("nama.$i"), 'telepon' => $request->input("kontak.$i")]
            );

            Transaksi::create([
                'kode_operator' => $operator->kode_operator,
                'kode_user' => $userfdb->kode_user,
                'kode_lapangan' => $lapangan,
                'kode_jadwal' => $request->input("kode_jadwal.$i"),
                'diskon' => $request->input("diskon.$i"),
                'tanggal' => $request->input("tanggal_jadwal.$i")
            ]);
        }

        return redirect('/tambahsewa');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'diskon' => $request->input('diskon'),
            'kode_jadwal' => $request->input('jadwal'),
            'tanggal' => $request->input('tanggal'),
        ]);

        $user = User::findOrFail($request->input('kode_user'));
        $user->update([
            'nama' => $request->input('nama'),
            'telepon' => $request->input('kontak'),
        ]);

        return response()->json($transaksi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect('/daftarpenyewa');
    }
}
