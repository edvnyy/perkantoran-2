<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;



class KaryawanController extends Controller
{
    public function index()
{
    $user = Auth::user();
    if ($user->role !== 'admin'){
        return redirect()->route('gaji.index')->with('access_denied', 'Anda tidak bisa mengakses halaman tabel karyawan.');
    } 
    $karyawans = Karyawan::with('gaji')->get();

    return view('karyawan.index', ['karyawan' => $karyawans, 'user' => $user]);

}
    public function create()
    {
        $gajis = Gaji::all();
        // $gajis = Karyawan::query()->whereDoesntHave('gajis')->get();

        return view('karyawan.create', ['gajis'=>$gajis]);
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'nik'=>'required|string' ,
        'nama' => 'required|string',
        'jenis_kelamin' => 'required',
        'no_telepon' => 'required|string',
        'alamat' => 'nullable',
    ]);

    $validated['gaji_id'] = $request->input('gaji_id');

    $karyawan = new Karyawan($validated);
    $karyawan->save();

    return redirect()->route('karyawan.index')->with('berhasil', "$request->nama Berhasil ditambahkan!");
}

    public function edit($id)
{
    // $karyawan = Karyawan::find($id);
    $karyawan = Karyawan::where('id', $id)->first();
    // $gajis = Gaji::where('id', $id)->first();
    $gajis = Gaji::oldest()->paginate(10);
    return view('karyawan.edit', compact(['karyawan', 'gajis']));
}
public function update(Request $request, Karyawan $karyawan)
{
    // $update_karyawan = Karyawan::findOrFail($id);

    $validated = $request->validate([
        'nik' => 'nullable',
        'nama' => 'required|string',
        'jenis_kelamin' => 'required',
        'alamat' => 'nullable',
        'gaji_id' => [
            'required',
            Rule::exists('gajis', 'id'),
            // Rule::unique('karyawans')->ignore($karyawan->id),
        ],
        'no_telepon' => 'required|string',
    ]);

    // $karyawan->update($validated);
    // $update_karyawan->update($validated);
    DB::table('karyawans')->where('id', $karyawan->id)->update([
        'nik' => $request->nik,
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'gaji_id' => $request->gaji_id,
        'no_telepon' =>$request->no_telepon,
    ]);
    return redirect()->route('karyawan.index')->with('berhasil', $karyawan->nama . " Berhasil diubah!");
}

    public function destroy(Karyawan $karyawans)
    {
        $karyawans->delete();

        return redirect()->route('karyawan.index')->with('berhasil', "$karyawans->nama Berhasil dihapus!");
    }

}
