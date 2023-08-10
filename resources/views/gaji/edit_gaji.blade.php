<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Edit Gaji Pokok</title>
</head>

<body>

    <div class="container mt-5">
        <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
            {{ csrf_field() }}
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input value="{{ old('nama', $gaji->id) }}" name="id" type="number"
                    class="form-control @error('nama') is-invalid @enderror">
                @error('id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Gaji Pokok</label>
                <input value="{{ old('nama', $gaji->jumlah_gaji) }}" name="jumlah_gaji" type="number"
                    class="form-control @error('nama') is-invalid @enderror">
                @error('jumlah_gaji')
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
