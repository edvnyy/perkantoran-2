<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="" class="form-label">NIK</label>
                <input value="{{ old('nik') }}" name="nik" type="number"
                    class="form-control @error('nik') is-invalid @enderror">
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nama</label>
                <input value="{{ old('nama') }}" name="nama" type="text"
                    class="form-control @error('nama') is-invalid @enderror">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">Pilih</option>
                    <option @selected(old('jenis_kelamin') == 'Laki-Laki') value="Laki-Laki">Laki-Laki</option>
                    <option @selected(old('jenis_kelamin') == 'Perempuan') value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Gaji Pokok</label>
                <select name="gaji_id" class="form-control @error('gaji_id') is-invalid @enderror">
                    <option value="">Pilih</option>
                    @foreach ($gajis as $gaji)
                        <option @selected(old('gaji') == $gaji->id) value="{{ $gaji->id }}">{{ $gaji->jumlah_gaji }}
                        </option>
                    @endforeach
                </select>
                @error('gaji_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">No Telepon</label>
                <textarea name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror">{{ old('no_telepon') }}</textarea>
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>
