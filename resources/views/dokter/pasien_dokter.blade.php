<!DOCTYPE html>
<html>
<head>
    <title>Data Pasien Dokter</title>
</head>
<body>

    <h1>Data Pasien</h1>

    <!-- SEARCH -->
    <form action="/dokter/pasien/search" method="GET">

        <input type="text"
               name="search"
               placeholder="Cari nama pasien">

        <button type="submit">
            Cari
        </button>

    </form>

    <br>

    <!-- TABEL PASIEN -->
    <table border="1" cellpadding="10">

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Alamat</th>
        </tr>

        @foreach($pasien as $pasien)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pasien->nama }}</td>
            <td>{{ $pasien->umur }}</td>
            <td>{{ $pasien->alamat }}</td>
        </tr>

        @endforeach

    </table>

</body>
</html>