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

  /* Card container */
  .card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start;
    padding-top: 20px;
  }

  .custom-card {
    flex: 0 0 auto;
    min-width: 220px;
    max-width: 220px;
    padding: 20px;
    background-color: #1f2937;
    color: #ffffff;
    border-radius: 10px;
    text-decoration: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease, background-color 0.3s ease;
    overflow-wrap: break-word;
  }

  .custom-card:hover {
    transform: scale(1.05);
    background-color: #495057;
  }

  h1 {
    font-size: 2.85rem;
  }

  .custom-card h6 {
    font-size: 1rem;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .custom-card p {
    font-size: 0.85rem;
    opacity: 0.8;
    margin-bottom: 10px;
    line-height: 1.4;
    color: #B8B8B8;
  }

  .custom-card small {
    font-size: 0.75rem;
    opacity: 0.6;
  }

  /* Mobile and Tablet Adjustments */
  @media (max-width: 768px) {
    body {
      padding-left: 0px;
    }

    main {
      margin-left: 0; /* Full width on mobile/tablet */
      padding: 15px;
    }

    .custom-card {
      min-width: 200px;
      max-width: 250px;
    }
  }

  @media (max-width: 576px) {
    .custom-card {
      min-width: 250px;
      max-width: 280px;
    }

    .custom-card h6 {
      font-size: 0.9rem;
    }

    .custom-card p {
      font-size: 0.8rem;
    }

    .custom-card small {
      font-size: 0.7rem;
    }
  }
</style>

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h3 text-dark"><b>Simple Additive Weighting (SAW)</b></h1>
    </div>
    <h6>
        Metode Simple Additive Weighting (SAW) merupakan salah satu metode yang digunakan<br> untuk pengambilan keputusan dengan banyak kriteria,
        <br>sering kali digunakan untuk memilih opsi terbaik dari beberapa alternatif<br> berdasarkan beberapa faktor penentu. Teknik ini juga dikenal sebagai metode penjumlahan bobot.
    </h6>

    <!-- Horizontal Scrolling Card Container -->
    <div class="card-container">
        <a href="#" class="custom-card">
            <h6>1. Menentukan Kriteria dan Bobot</h6>
            <p>Pilih kriteria yang penting untuk menilai berbagai alternatif yang ada, lalu berikan bobot pada setiap kriteria sesuai tingkat pentingnya.</p>
            <small>Langkah 1</small>
        </a>
        <a href="#" class="custom-card">
            <h6>2. Menyusun Matriks Keputusan</h6>
            <p>Buat matriks yang menunjukkan nilai setiap alternatif berdasarkan masing-masing kriteria.</p>
            <small>Langkah 2</small>
        </a>
        <a href="#" class="custom-card">
            <h6>3. Normalisasi Matriks Keputusan</h6>
            <p>Lakukan normalisasi untuk menyelaraskan skala nilai pada matriks.</p>
            <small>Langkah 3</small>
        </a>
        <a href="#" class="custom-card">
            <h6>4. Menghitung Nilai Bobot</h6>
            <p>Kalikan nilai yang sudah dinormalisasi dengan bobot kriteria untuk mendapatkan matriks dengan bobot akhir.</p>
            <small>Langkah 4</small>
        </a>
        <a href="#" class="custom-card">
            <h6>5. Menjumlahkan Nilai Terbobot</h6>
            <p>Tambahkan semua nilai bobot untuk tiap alternatif: Vi =∑j=n Vij</p>
            <small>Langkah 5</small>
        </a>
        <a href="#" class="custom-card">
            <h6>6. Memilih Alternatif Terbaik</h6>
            <p>Alternatif dengan jumlah bobot tertinggi menjadi pilihan terbaik.</p>
            <small>Langkah 6</small>
        </a>
    </div>
</main>

@endsection
