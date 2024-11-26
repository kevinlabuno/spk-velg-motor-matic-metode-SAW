<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page SPK SAW</title>
    <style>
/* Base Styles (All Devices) */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.unique-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    background-color: #1f2937;
    color: white;
}

.unique-header-left {
    display: flex;
    align-items: center;
}

.unique-header-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 15px;
}

.unique-header-title {
    font-size: 1.2rem;
    line-height: 1.4;
}

.unique-header-right .unique-button {
    margin-left: 10px;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.unique-login-button {
    background-color: #ffffff;
    color:  #1f2937;
}

.unique-login-button:hover {
    background-color: #1f2937;
    color: #ffffff;
}

.unique-start-button {
    background-color: #ffffff;
    color: rgb(39, 39, 39);
}

.unique-start-button:hover {
    background-color: #1f2937;
    color: #ffffff;
}

.uniques-starts-button {
    background-color: #1f2937;
    color: #ffffff;
}

.uniques-starts-button:hover {
    background-color: #ffffff;
    color: #1f2937;
}

.unique-main {
    padding: 20px;
}

.unique-section {
    margin-bottom: 40px;
    text-align: center;
}

.unique-card {
    background-color: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px auto;
    max-width: 800px;
    text-align: center;
}

.unique-card-title {
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: #18344A;
}

.unique-card-description {
    font-size: 1rem;
    color: #555;
    line-height: 1.6;
    word-wrap: break-word;
}

.unique-card-image-container {
    margin-top: 20px;
    text-align: center;
}

.unique-card-image {
    width: 100%;
    max-width: 600px; /* Patokan untuk laptop */
    height: auto;
    border-radius: 15px;
    margin: 0 auto; /* Memastikan image berada di tengah */
}

.unique-card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 15px; /* Jarak antar card lebih kecil */
}


.unique-card-container .unique-card {
    flex: 0 1 calc(33% - 20px);
    max-width: calc(33% - 20px);
    box-sizing: border-box;
}

/* Responsive Styles */
/* For very wide screens (desktops, >1400px) */
@media (min-width: 1400px) {
    .unique-header {
        padding: 20px 60px;
    }

    .unique-header-title {
        font-size: 1.5rem;
    }

    .unique-header-image {
        width: 60px;
        height: 60px;
    }

    .unique-button {
        padding: 12px 24px;
    }

    .unique-card {
        max-width: 900px;
    }
}

/* For laptops and medium-sized desktops (1024px to 1400px) */
@media (min-width: 1024px) and (max-width: 1399px) {
    .unique-header {
        padding: 20px 40px;
    }

    .unique-header-title {
        font-size: 1.4rem;
    }

    .unique-header-image {
        width: 55px;
        height: 55px;
    }
    
    .unique-card-image {
        max-width: 550px; /* Sedikit lebih kecil untuk laptop */
    }

    .unique-button {
        padding: 10px 20px;
    }

    .unique-card {
        max-width: 750px;
    }
        .unique-card-container .unique-card {
        flex: 0 1 calc(30% - 15px); /* Pastikan card tetap proporsional */
    }
}

/* For tablets (768px to 1023px) */
@media (min-width: 768px) and (max-width: 1023px) {
    .unique-header {
        flex-direction: column;
        align-items: center;
        padding: 15px 20px;
        text-align: center;
    }

    .unique-header-left {
        margin-bottom: 10px;
    }

    .unique-header-right {
        display: flex;
        gap: 10px;
    }

    .unique-header-image {
        width: 50px;
        height: 50px;
    }

    .unique-header-title {
        font-size: 1.3rem;
    }

        .unique-card-container .unique-card {
        flex: 0 1 calc(45% - 15px); /* Dua card per baris */
    }
        .unique-card-image {
        max-width: 500px; /* Sesuaikan ukuran untuk tablet */
    }

    .unique-card {
        padding: 15px;
    }
}

/* For mobile devices (up to 767px) */
@media (max-width: 767px) {
    .unique-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

        .unique-card-image {
        max-width: 90%; /* Tidak terlalu besar di mobile */
    }

    .unique-header-left {
        margin-bottom: 10px;
    }

    .unique-header-image {
        width: 40px;
        height: 40px;
    }

    .unique-header-title {
        font-size: 1.2rem;
    }

    .unique-header-right {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .unique-button {
        padding: 8px 16px;
        font-size: 0.9rem;
    }

    .unique-card-container .unique-card {
        flex: 0 1 100%;
        max-width: 100%;
    }

    .unique-card {
        padding: 10px;
    }

    .unique-card-title {
        font-size: 1rem;
    }

    .unique-card-description {
        font-size: 0.9rem;
    }
}

    </style>
</head>
<body>
    <header class="unique-header">
        <div class="unique-header-left">
            <img src="assets/img/main-image.jpg" alt="Rounded Image" class="unique-header-image">
            <h1 class="unique-header-title">SPK Velg Motor Matic</h1>
        </div>
        <div class="unique-header-right">
            <a href="{{url('login')}}" class="unique-button unique-login-button">Masuk</a>
            <a href="{{url('pemilihan')}}" class="unique-button unique-start-button">Mulai Perhitungan</a>
        </div>
    </header>

    <main class="unique-main">
        <!-- Section 1: Metode SPK SAW -->
        <section class="unique-section unique-method">
            <div class="unique-card">
                <h2 class="unique-card-title">Metode SPK SAW</h2>
                <p class="unique-card-description">
                    Simple Additive Weighting (SAW) adalah metode SPK yang digunakan untuk menyelesaikan masalah seleksi dengan cara menjumlahkan nilai bobot kriteria. Metode ini membantu dalam pengambilan keputusan yang lebih terstruktur dan terukur.
                </p>
                <p class="unique-card-description">
                    Dalam konteks ini, metode SAW dapat digunakan untuk memilih velg motor matic berdasarkan kriteria seperti harga, ketahanan, desain, bahan, ukuran dan berat. 
                </p>
                <div class="unique-card-image-container">
                    <img src="assets/img/main-image.jpg" alt="Rounded Image" class="unique-card-image">
                </div>
            </div>
        </section>

        <!-- Section 2: Tahapan Algoritma -->
        <section class="unique-section unique-algorithm">
            <h2 class="unique-section-title">Tahapan Algoritma</h2>
             <div class="unique-header-right">
            <a class="unique-button uniques-starts-button">Mulai Perhitungan</a>
             </div>
            <div class="unique-card-container">
                <div class="unique-card">
                    <h3 class="unique-card-title">Langkah 1</h3>
                    <p class="unique-card-description">
                        Menentukan Kriteria dan Bobot<br>
                        Pilih kriteria yang penting untuk menilai berbagai alternatif yang ada, lalu berikan bobot pada setiap kriteria sesuai tingkat pentingnya.
                    </p>
                </div>
                <div class="unique-card">
                    <h3 class="unique-card-title">Langkah 2</h3>
                    <p class="unique-card-description">
                        Menyusun Matriks Keputusan<br>
                        Buat matriks yang menunjukkan nilai setiap alternatif berdasarkan masing-masing kriteria.
                    </p>
                </div>
                <div class="unique-card">
                    <h3 class="unique-card-title">Langkah 3</h3>
                    <p class="unique-card-description">
                        Normalisasi Matriks Keputusan<br>
                        Lakukan normalisasi untuk menyelaraskan skala nilai pada matriks.
                    </p>
                </div>
                <div class="unique-card">
                    <h3 class="unique-card-title">Langkah 4</h3>
                    <p class="unique-card-description">
                        Menghitung Nilai Bobot<br>
                        Kalikan nilai yang sudah dinormalisasi dengan bobot kriteria untuk mendapatkan matriks dengan bobot akhir.
                    </p>
                </div>
                <div class="unique-card">
                    <h3 class="unique-card-title">Langkah 5</h3>
                    <p class="unique-card-description">
                        Menjumlahkan Nilai Terbobot<br>
                        Tambahkan semua nilai bobot untuk tiap alternatif: Vi =∑j=n Vij
                    </p>
                </div>
                <div class="unique-card">
                    <h3 class="unique-card-title">Langkah 6</h3>
                    <p class="unique-card-description">
                        Memilih Alternatif Terbaik<br>
                        Alternatif dengan jumlah bobot tertinggi menjadi pilihan terbaik.
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
