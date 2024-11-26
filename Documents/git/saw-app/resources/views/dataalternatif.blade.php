@extends('layout.app')
    <style>
      body {
    margin: 0;
    padding: 0;
    padding-top: 20px;
    margin-top:50px;
    box-sizing: border-box;
    padding-left: 260px
  }
    .container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    padding-left: 260px
}

.card {
    background-color: #1f2937;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.field-group {
    margin-bottom: 15px;
}

.field-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.field-group input, 
.field-group select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn-submit {
    background-color: #1f2937;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-submit:hover {
    background-color: #45a049;
}

.btn-delete {
    background-color: #1f2937;
    color: white;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-delete:hover {
    background-color: #c0392b;
}

.table-container table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 15px;
    overflow: hidden;
}

.table-container th, 
.table-container td {
    text-align: left;
    padding: 10px;
}

.table-container th {
    background-color: #2c3e50;
    color: white;
}

.table-container tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table-container tr:hover {
    background-color: #ddd;
}

  @media (max-width: 768px) {
    body {
        
      padding-left: 0px;
    }
    .container {
    max-width: 350px;
}
  }

    </style>

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h3 text-dark"><b>Data Alternatif</b></h1>
    </div>
    <div class="container">
        <h5 class="text-dark">Tambah data alternatif yang akan dikelola</h5>
        <hr>
        @if (session('success'))
            <div class="alert alert-primary">{{session('success')}}</div>
        @endif
        <div class="card">
            <form action="{{ route('dataalternatif.store') }}" method="POST" onsubmit="return confirmSave(event)">
                @csrf
                <div class="field-group">
                    <label for="alternatif">Velg (Alternatif)</label>
                    <input type="text" id="alternatif" name="alternatif" required>
                </div>
                <div class="field-group">
                    <label for="c1">Harga (c1)</label>
                    <input type="number" id="c1" name="c1" required>
                </div>
                <div class="field-group">
                    <label for="c2">Ketahanan (c2)</label>
                    <select id="c2" name="c2" required>
                        <option value="Sangat Buruk">Sangat Buruk</option>
                        <option value="Buruk">Buruk</option>
                        <option value="Biasa">Biasa</option>
                        <option value="Bagus">Bagus</option>
                        <option value="Sangat Bagus">Sangat Bagus</option>
                    </select>
                </div>
                <div class="field-group">
                    <label for="c3">Desain (c3)</label>
                    <select id="c3" name="c3" required>
                        <option value="Jari-Jari">Jari-Jari</option>
                        <option value="Bintang Racing">Bintang Racing</option>
                        <option value="Palang Racing">Palang Racing</option>
                        <option value="Palang CNC">Palang CNC</option>
                        <option value="Bintang CNC">Bintang CNC</option>
                    </select>
                </div>
                <div class="field-group">
                    <label for="c4">Bahan (c4)</label>
                    <select id="c4" name="c4" required>
                        <option value="Aluminium">Aluminium</option>
                        <option value="Magnesium">Magnesium</option>
                        <option value="Karbon">Karbon</option>
                    </select>
                </div>
                <div class="field-group">
                    <label for="c5">Ukuran (c5)</label>
                    <select id="c5" name="c5" required>
                        <option value="Ring 13">Ring 13</option>
                        <option value="Ring 14">Ring 14</option>
                    </select>
                </div>
                <div class="field-group">
                    <label for="c6">Berat (c6)</label>
                    <select id="c6" name="c6" required>
                        <option value="Sangat Berat">Sangat Berat</option>
                        <option value="Cukup Berat">Cukup Berat</option>
                        <option value="Berat">Berat</option>
                        <option value="Ringan">Ringan</option>
                        <option value="Sangat Ringan">Sangat Ringan</option>
                    </select>
                </div>
                <button type="submit" class="btn-submit" style="color:#ffffff">Tambah Data</button>
            </form>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>Harga</th>
                        <th>Ketahanan</th>
                        <th>Desain</th>
                        <th>Bahan</th>
                        <th>Ukuran</th>
                        <th>Berat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataalternatifs as $item)
                        <tr>
                            <td>{{ $item->alternatif }}</td>
                            <td>{{ $item->c1 }}</td>
                            <td>{{ $item->c2 }}</td>
                            <td>{{ $item->c3 }}</td>
                            <td>{{ $item->c4 }}</td>
                            <td>{{ $item->c5 }}</td>
                            <td>{{ $item->c6 }}</td>
                            <td>
                                <form action="{{ route('dataalternatif.destroy', $item->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script>
    function confirmDelete(event) {
        if (!confirm("Apakah Anda yakin ingin menghapus data ini? Data akan hilang dan tidak bisa dikembalikan.")) {
            event.preventDefault(); // Mencegah form dikirim jika pengguna memilih "Batal"
            return false;
        }
        return true;
    }
</script>
<script>
    function confirmSave(event) {
        const confirmation = confirm("Apakah data sudah benar? Data yang Anda masukkan akan disimpan. Klik OK untuk melanjutkan.");
        if (!confirmation) {
            event.preventDefault(); // Mencegah form dikirim jika pengguna memilih "Batal"
            return false;
        }
        return true;
    }
</script>
@endsection
