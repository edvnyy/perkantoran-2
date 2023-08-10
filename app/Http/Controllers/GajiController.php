<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GajiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role !== 'staf'){
            return redirect()->route('karyawan.index')->with('access_denied', 'Anda tidak memiliki akses untuk melihat tabel gaji.');
        } // Mengambil informasi user yang sedang diotentikasi
        $gaji = Gaji::paginate(10);
        return view('gaji.index_gaji', compact('gaji'));
    }
    public function create()
    {

        return view('gaji.create_gaji');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id',
            'jumlah_gaji'=> 'required|int',
        ]);

        Gaji::create($validated);
        return redirect()->route('gaji.index')->with('berhasil', "$request->jumlah_gaji Berhasil ditambahkan!");
    }
    public function edit(string $id)
    {
        $gaji = Gaji::find($id);
    return view('gaji.edit_gaji', compact('gaji'));
    }
    public function update(Request $request, $gaji)
{
    $validated = $request->validate([
        'jumlah_gaji' => 'required',
    ]);

    $gaji = Gaji::findOrFail($gaji);
    $gaji->update($validated);

    return redirect()->route('gaji.index')->with('berhasil', "$gaji->jumlah_gaji Berhasil diubah!");
    // $gaji = Gaji::find($id);

    // Pastikan Anda menggunakan field yang benar untuk update
    // $gaji->jumlah_gaji = $request->input('jumlah_gaji');
    // $gaji->save();

    // return redirect()->route('gaji.index')->with('success', 'Data gaji berhasil diperbarui');
}

public function destroy(Gaji $gajis)
{
    $gajis->delete();

    return redirect()->route('gaji.index')->with('berhasil', "$gajis->jumlah_gaji Berhasil dihapus!");

}
}

