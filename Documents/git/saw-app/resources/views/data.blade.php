@extends('layout.app')

<style>
  /* Reset Body */
  body {
    margin: 0;
    padding: 0;
    padding-top: 20px;
    padding-left: 250px;
    box-sizing: border-box;
    background-color: #1f2937; /* Background global */
    font-family: Arial, sans-serif;
  }

  @media (max-width: 768px) {
    body {
      padding-left: 0;
      padding-top: 20px;
    }
  }

  /* Scrollable Container Styling */
  .scrollable-container {
    display: flex;
    gap: 1rem;
    overflow-x: auto;
    padding: 20px;
    scroll-snap-type: x mandatory;
    flex-wrap: wrap; /* Allow cards to wrap to the next line on smaller screens */
  }

  .scrollable-container::-webkit-scrollbar {
    height: 8px;
  }

  .scrollable-container::-webkit-scrollbar-thumb {
    background-color: #495057; /* Scrollbar thumb color */
    border-radius: 10px;
  }

  /* Custom Card Styling */
  .custom-card {
    min-width: 200px;
    max-width: 200px;
    background-color: #1f2937;
    color: #f8f9fa;
    flex: 0 0 auto;
    scroll-snap-align: start;
    border: none;
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
    margin-bottom: 1rem; /* Add margin for vertical spacing */
  }

  .custom-card img {
    height: 150px;
    object-fit: cover;
    width: 100%;
  }

  .custom-card:hover {
    transform: scale(1.05);
    background-color: #495057; /* Darker background on hover */
  }

  .custom-card-title {
    padding-top: 30px;
    font-size: 1.2rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 0.5rem;
    color: #f8f9fa; /* White text for title */
  }

  .custom-card-text {
    font-size: 0.9rem;
    text-align: center;
    font-weight: 300;
    padding: 0 1rem;
    color: #B8B8B8; /* Light gray text for description */
  }

  @media (max-width: 768px) {
    .custom-card {
      min-width: 100%; /* Full width on mobile */
      max-width: 100%;
    }

    .custom-card-title {
      font-size: 1rem;
    }

    .custom-card-text {
      font-size: 0.8rem;
    }
  }

  /* Section Title */
  .section-title {
    font-size: 1.8rem;
    font-weight: bold;
    color: #343a40;
    margin-bottom: 20px;
    text-align: center;
  }

  /* Button Styling (Optional) */
  .btn-custom {
    background-color: #343a40;
    color: #f8f9fa;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }

  .btn-custom:hover {
    background-color: #495057; /* Hover color */
  }
</style>

@section('content')

<main role="main" class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h2 class="h3 text-dark"><b>Data</b></h2>
  </div>

  <!-- Scrollable Card Container -->
  <div class="scrollable-container">
    <!-- Card 1 -->
    <div class="custom-card">
      <img src="assets/img/vnd-velg.jpg" alt="VND Velg" class="card-img-top">
      <div class="card-body">
        <h4 class="custom-card-title">VND Velg</h4>
        <p class="custom-card-text">Velg dengan desain stylish dan ringan, cocok untuk motor matic harian.</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="custom-card">
      <img src="assets/img/rcb-velg.jpg" alt="RCB Velg" class="card-img-top">
      <div class="card-body">
        <h4 class="custom-card-title">RCB Velg</h4>
        <p class="custom-card-text">Velg berkualitas tinggi dengan performa optimal untuk berbagai kebutuhan.</p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="custom-card">
      <img src="assets/img/scarlet-velg.jpg" alt="Scarlet Velg" class="card-img-top">
      <div class="card-body">
        <h4 class="custom-card-title">Scarlet Velg</h4>
        <p class="custom-card-text">Velg tahan lama dengan desain sporty untuk pengendara modern.</p>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="custom-card">
      <img src="assets/img/vrossi-velg.jpg" alt="VROSSI Velg" class="card-img-top">
      <div class="card-body">
        <h4 class="custom-card-title">VROSSI Velg</h4>
        <p class="custom-card-text">Pilihan terbaik untuk velg balap dengan material ringan dan kuat.</p>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="custom-card">
      <img src="assets/img/delkevic-velg.jpg" alt="DELKEVIC Velg" class="card-img-top">
      <div class="card-body">
        <h4 class="custom-card-title">DELKEVIC Velg</h4>
        <p class="custom-card-text">Velg premium dengan finishing yang elegan dan ketahanan luar biasa.</p>
      </div>
    </div>

  </div>
</main>

@endsection
