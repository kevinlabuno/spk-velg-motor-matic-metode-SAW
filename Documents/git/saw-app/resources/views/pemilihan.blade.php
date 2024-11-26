@extends('layout.app')
<style>
    body {
        margin: 0;
        padding: 0;
        padding-top: 10px;
        box-sizing: border-box;
    }

    main {
        margin-left: 250px;
        margin-right: 20px;
        padding: 20px;
        box-sizing: border-box;
    }

    @media (max-width: 768px) {
        body {
            padding-left: 0px;
        }

        main {
            margin-left: 0;
            padding: 15px;
        }
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #1f2937; /* Warna tabel */
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #1f2937; /* Header tabel */
        color: white; /* Warna teks header */
    }

    td {
        background-color: #1f2937; /* Isi tabel */
        color: white; /* Warna teks isi */
    }

    @media (max-width: 992px) {
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        thead {
            display: table;
            width: 100%;
        }

        tbody {
            display: table;
            width: 100%;
        }

        tr {
            display: table-row;
            width: 100%;
        }

        th, td {
            display: table-cell;
            width: auto;
        }
    }

    @media (max-width: 576px) {
        table {
            font-size: 0.9rem;
        }

        th, td {
            padding: 8px;
        }
    }

    .btn-light {
        background-color: #f8f9fa;
        color: #343a40;
        border: 1px solid #ddd;
    }

    .btn-light:hover {
        background-color: #e9ecef;
        color: #495057;
    }

    .card {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        background-color: #343a40;
        color: white;
    }

    .card.bg-dark {
        background-color: #495057;
    }

    .alert-success {
        background-color: #4CAF50;
        color: white;
    }

    .alert-danger {
        background-color: #f44336;
        color: white;
    }
</style>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    
    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
@endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h2 class="h3 text-dark"><b>Data Alternatif</b></h2>
    
@auth
        @if(\App\Models\Data::count() > 1 && \App\Models\Bobot::count() > 1)
    <form action="{{ route('truncate.data') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua data perhitungan?')">
        @csrf
        <button type="submit" class="btn btn-danger">Hapus Hasil Perhitungan Sebelumnya</button>
    </form>
    @endif
@endauth
</div>

    <div class="container mt-5">
        <h5 class="text-dark">Pilih data alternatif yang akan dikelola</h5>
        <hr class="border-dark">
        <form id="alternatifForm" action="{{ route('pemilihan.post') }}" method="POST">
            @csrf
            <div class="table">
            <div class="card text-white rounded-lg p-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>Alternatif (Velg)</th>
                            <th>Harga</th>
                            <th>Ketahanan</th>
                            <th>Desain</th>
                            <th>Bahan</th>
                            <th>Ukuran</th>
                            <th>Berat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td><input type="checkbox" name="alternatives[]" value="{{ $item->id }}" class="form-check-input"></td>
                            <td>{{ $item->alternatif }}</td>
                            <td>Rp {{ number_format($item->c1) }}</td>
                            <td>{{ $item->c2 }}</td>
                            <td>{{ $item->c3 }}</td>
                            <td>{{ $item->c4 }}</td>
                            <td>{{ $item->c5 }}</td>
                            <td>{{ $item->c6 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn  btn-dark">Simpan</button>
            </div>
            </div>
        </form>

        @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif
    </div>
</main>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('alternatifForm');

        form.addEventListener('submit', function (event) {
            // Ambil semua checkbox yang dicentang
            const selectedCheckboxes = document.querySelectorAll('input[name="alternatives[]"]:checked');

            // Cek apakah ada checkbox yang dicentang
            if (selectedCheckboxes.length < 1) {
                event.preventDefault(); // Hentikan submit form
                alert('Harap pilih setidaknya satu data alternatif sebelum menyimpan.');
            }
        });
    });
</script>
