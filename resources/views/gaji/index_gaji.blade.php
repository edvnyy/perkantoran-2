<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        @if(session('access_denied'))
        <div class="alert alert-danger" role="alert">
            {{ session('access_denied') }}
        </div>
    @endif

        <a href="{{ route('gaji.create_gaji') }}" class="btn btn-outline-primary">Tambah Data</a>

        @if ($pesan = session('berhasil'))
            <div class="alert alert-primary" role="alert">
                {{ $pesan }}
            </div>
        @endif

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Gaji Pokok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tr>
                @foreach ($gaji as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->jumlah_gaji }}</td>
                <td>
                    <a href="{{ route('gaji.edit', $item->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                    <form action="{{ route('gaji.destroy', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-grid gap-2">
            <a href="{{ route('karyawan.index') }}" class="btn btn-outline-success"
                style="text-decoration:none;">Lihat
                Tabel Karyawan</a>
        </div> <br>
        <div class="d-grid gap-2">
            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-danger btn">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>


</body>

</html>
