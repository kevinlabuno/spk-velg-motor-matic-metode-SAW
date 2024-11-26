@extends('layout.app')

<style>
body {
    margin: 0;
    padding: 0;
    padding-top: 10px;
    padding-left: 250px;
}


.card-custom {
    background-color: #1f2937;
    border-radius: 15px;
    padding: 20px;
    width: 900px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.featurette-heading {
    font-size: 1.3rem;
    color: #FFFFFF;
    font-weight: 700;
}

p2 {
    font-size: 0.95rem;
    line-height: 1.5;
    color: #BBBBBB;
    margin-bottom: 15px;
}

/* Button styling */
.btn-custom {
    background-color: #BBBBBB;
    border: none;
    color: #BBBBBB;
    padding: 8px 16px;
    font-size: 0.9rem;
    border-radius: 8px;
    margin-right: 10px;
    transition: background-color 0.3s ease;
}

.btn-custom:hover {
    background-color: #555;
    color: #FFF;
}

.featurette {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    margin-bottom: 30px;
}

.featurette .col-md-7,
.featurette .col-md-5 {
    flex: 1;
    padding: 15px;
}

.featurette-image-container {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.featurette-image {
    max-width: 90%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.hr-line {
    border: 1px solid #444;
    margin: 30px 0;
}


@media (max-width: 1024px) {
    body {
        padding-left: 250px;
        padding-right: 15px;
        font-size: 0.85rem;
    }

    .card-custom {
        width: 550px;
        padding: 15px;
    }

    .featurette-heading {
        font-size: 1.2rem;
    }

    .featurette .col-md-7,
    .featurette .col-md-5 {
        padding: 10px;
    }

    .btn-custom {
        font-size: 0.85rem;
        padding: 7px 14px;
    }
}

@media (max-width: 768px) {
    
        .card-custom {
        width: 550px;
        padding: 0px;
    }
    
    body {
        padding-left: 0px;
        font-size: 0.8rem;
    }

    .featurette {
        flex-direction: column;
        align-items: stretch;
    }

    .featurette-image {
        max-width: 100%;
    }

    .card-custom {
        margin: 10px 0;
        padding: 15px;
    }
}

@media (max-width: 480px) {
    body {
        padding-left: 0px;
        font-size: 0.8rem;
    }

    .card-custom {
        width: 350px;
    }

    .featurette-heading {
        font-size: 1.1rem;
        text-align: center;
    }

    .featurette-image-container {
        margin: 15px 0;
    }

    .btn-custom {
        font-size: 0.75rem;
        padding: 6px 12px;
    }
}

</style>


@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h2 class="h3 text-dark"><b>Beranda</b></h2>
    </div>

  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="card-custom">
        <div class="row featurette">
            <div class="col-md-6">
                <h4 class="featurette-heading">Sistem Pendukung Keputusan untuk Pemilihan Alternatif Berdasarkan Kriteria</h4>
                <p2>Sistem Pendukung Keputusan (SPK) ini dirancang untuk membantu pengambil keputusan dalam memilih alternatif terbaik berdasarkan beberapa kriteria yang telah ditentukan. Dalam sistem ini, berbagai alternatif dievaluasi berdasarkan kriteria seperti harga, ketahanan, desain, bahan, ukuran, dan berat.</p2>
                <p2>Metode Simple Additive Weighting (SAW) digunakan untuk mengolah data dari berbagai alternatif, memberikan penilaian objektif, dan merekomendasikan pilihan terbaik berdasarkan bobot setiap kriteria. Hasilnya dihitung melalui normalisasi nilai kriteria, dan alternatif dengan skor tertinggi disarankan sebagai pilihan utama.</p2>
                <p2>Sistem ini memudahkan evaluasi dan seleksi alternatif secara efisien, memberikan dukungan keputusan yang akurat, serta menghasilkan pilihan yang lebih informatif dan logis.</p2>
            </div>
            <div class="col-md-5">
                <h4 class="featurette-heading">Metode SAW</h4>
                <p2>Metode Simple Additive Weighting (SAW) sering digunakan untuk menentukan pilihan terbaik dengan beberapa kriteria berbobot. Metode ini menggabungkan nilai terbobot dan normalisasi data untuk memberikan peringkat alternatif yang akurat.</p2>
                <div>
                    <br>
                    <a href="{{ route('algoritma') }}" class="btn btn-light">Pelajari Lebih Lanjut</a>
                    <a href="{{ route('perhitungan') }}" class="btn btn-light">Mulai Perhitungan</a>
                </div>
            </div>
        </div>

        <!-- Image between sections -->
        <div class="featurette-image-container">
            <img class="featurette-image" src="assets/img/main-image.jpg" alt="Feature Image">
        </div>
    </div>
</main>
@endsection
