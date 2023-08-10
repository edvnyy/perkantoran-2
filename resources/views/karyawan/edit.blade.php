<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Data Karyawan</title>
</head>

<body>

    <div class="container mt-5">
        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
            @csrf
            {{-- {{ csrf_field() }} --}}
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input value="{{ old('nik', $karyawan->nik) }}" name="nik" type="number"
                    class="form-control @error('nik') is-invalid @enderror">
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input value="{{ old('nama', $karyawan->nama) }}" name="nama" type="text"
                    class="form-control @error('nama') is-invalid @enderror">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">Pilih</option>
                    <option @selected(old('jenis_kelamin', $karyawan->jenis_kelamin) == 'Laki-Laki') value="Laki-Laki">Laki-Laki</option>
                    <option @selected(old('jenis_kelamin', $karyawan->jenis_kelamin) == 'Perempuan') value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label class="form-label">Gaji Pokok</label>
                <select name="gaji_id" class="form-control @error('gaji_id') is-invalid @enderror">
                    <option value="">Pilih</option>
                    @foreach ($karyawans as $karyawan)
                        <option @selected(old('jurusan', $karyawan->gaji_id) == $gajis->id) value="{{ $gajis->id }}">{{ $gajis->nama }}</option>
                    @endforeach
                </select>
                @error('jurusan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label class="form-label">Gaji Pokok</label>
                <select name="gaji_id" class="form-control @error('gaji_id') is-invalid @enderror">
                    <option value="">Pilih</option>
                    @foreach ($gajis as $gaji)
                        <option @selected(old('gaji_id', $karyawan->gaji_id) == $gaji->id) value="{{ $gaji->id }}" >{{ $gaji->jumlah_gaji }}</option>
                    @endforeach
                </select>
                @error('gaji_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label class="form-label">Gaji Pokok</label>
                <input type="text" value="{{ old('gaji_id', $gajis->jumlah_gaji) }}" name="gaji_id"
                    class="form-control text-dark bg-transparent shadow @error('gaji_id') is-invalid @enderror"
                    id="floatingInput" placeholder="Jumlah Gaji">
                @error('gaji_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}


            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $karyawan->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">No Telp</label>
                <textarea name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror">{{ old('no_telepon', $karyawan->no_telepon) }}</textarea>
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
