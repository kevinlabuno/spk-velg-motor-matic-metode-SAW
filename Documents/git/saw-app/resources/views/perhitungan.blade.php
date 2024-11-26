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

  .card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: flex-start;
    padding-top: 20px;
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

  @media (max-width: 576px) {
    .row.g-3 {
      flex-direction: column;
    }

    .col-sm-6 {
      width: 100%;
      padding: 0;
    }
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
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
             <h2 class="h3"><b>Perhitungan</b></h2>
          </div>
          
          @if (session('success'))
            <div class="alert alert-dark">{{session('success')}}</div>
          @endif
    {{-- ---------BOBOT INPUTAN PENGGUNA------------- --}}
    <div class="container mt-5">
        <h2>Bobot yang diinput</h2>
         <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Tipe</th>
                    <th>Bobot</th>
                    <th>W</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bobot as $item)
                    <tr>
                        <td><b>{{ $item->kriteria }}</b></td>
                        <td>{{ $item->tipe }}</td>
                        <td>{{ $item->bobot }}%</td>
                        <td>{{ $item->w }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><b>Total Bobot</b></td>
                    <td colspan="2"><b>{{ $bobot->sum('bobot') }}%</b></td>
                </tr>
            </tfoot>
        </table>
    </div>
   
    {{-- ---------DATA ALTERNATIF------------- --}}
      <div class="container mt-5">
        <h2>Data Alternatif</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kualitas (A/C)</th>
                    <th>Harga (c1)</th>
                    <th>Ketahanan (c2)</th>
                    <th>Desain (c3)</th>
                    <th>Bahan (c4)</th>
                    <th>Ukuran (c5)</th>
                    <th>Berat (c6)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pure as $item)
                    <tr>
                        <td> <b> Velg {{$item->alternatif}}</b></td>
                        <td>{{$item->c1}}</td>
                        <td>{{$item->c2}}</td>
                        <td>{{$item->c3}}</td>
                        <td>{{$item->c4}}</td>
                        <td>{{$item->c5}}</td>
                        <td>{{$item->c6}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- ---------KONVERSI NILAI DATA------------- --}}
     <div class="container mt-5">
        <h2>Konversi Nilai Data Alternatif</h2>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#konversiModal">
            Keterangan Konversi
        </button>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>A/C</th>
                    <th>c1</th>
                    <th>c2</th>
                    <th>c3</th>
                    <th>c4</th>
                    <th>c5</th>
                    <th>c6</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                         <td><b> Kayu {{$item->alternatif}}</b></td>
                        <td>{{$item->c1}}</td>
                        <td>{{$item->c2}}</td>
                        <td>{{$item->c3}}</td>
                        <td>{{$item->c4}}</td>
                        <td>{{$item->c5}}</td>
                        <td>{{$item->c6}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- ---------HASIL NORMALISASI------------- --}}
      <div class="container mt-5">
        <h2>Hasil Normalisasi</h2>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#imageModal">
             Lihat Rumus
        </button>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>A/C</th>
                    <th>c1</th>
                    <th>c2</th>
                    <th>c3</th>
                    <th>c4</th>
                    <th>c5</th>
                    <th>c6</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($normal as $row)
                    <tr>
                        <td><b>Velg {{ $row['alternatif'] }}</b></td>
                        <td>{{ $row['c1'] }}</td>
                        <td>{{ $row['c2'] }}</td>
                        <td>{{ $row['c3'] }}</td>
                        <td>{{ $row['c4'] }}</td>
                        <td>{{ $row['c5'] }}</td>
                        <td>{{ $row['c6'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- ---------KONVERSI NILAI DATA------------- --}}
     <div class="container mt-5">
    <h2>Hasil Perhitungan & Perankingan</h2>
    <hr>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>A/C</th>
                <th>c1</th>
                <th>c2</th>
                <th>c3</th>
                <th>c4</th>
                <th>c5</th>
                <th>c6</th>
                <th>V</th>
                <th>Ranking</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($rank as $index => $item)
        <tr>
            <td><b>{{ $item->alternatif }}</b></td>
            <td>{{ $item->c1 }}</td>
            <td>{{ $item->c2 }}</td>
            <td>{{ $item->c3 }}</td>
            <td>{{ $item->c4 }}</td>
            <td>{{ $item->c5 }}</td>
            <td>{{ $item->c6 }}</td>
            <td>{{ $item->v }}</td>
            <td>{{ $index + 1 }}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
</div>

    

    </main>

  {{-- ---------------MODAL KETERANGAN KONVERSI---------------- --}}
    <div class="modal fade" id="konversiModal" tabindex="-1" role="dialog" aria-labelledby="konversiModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="konversiModalLabel">Keterangan Konversi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Harga (c1)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>0-5 Juta</td><td>1</td></tr>
                                        <tr><td>6-10 Juta</td><td>2</td></tr>
                                        <tr><td>11-15 Juta</td><td>3</td></tr>
                                        <tr><td>16-20 Juta</td><td>4</td></tr>
                                        <tr><td>> 21 Juta</td><td>5</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Kualitas (c2)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Sangat Tidak Bagus</td><td>1</td></tr>
                                        <tr><td>Tidak Bagus</td><td>2</td></tr>
                                        <tr><td>Bagus</td><td>3</td></tr>
                                        <tr><td>Cukup Bagus</td><td>4</td></tr>
                                        <tr><td>Sangat Bagus</td><td>5</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Estetika (c3)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Sangat Polos</td><td>1</td></tr>
                                        <tr><td>Polos</td><td>2</td></tr>
                                        <tr><td>Berurat</td><td>3</td></tr>
                                        <tr><td>Cukup Berurat</td><td>4</td></tr>
                                        <tr><td>Sangat Berurat</td><td>5</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Jangka Waktu (c4)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>0-10 Tahun</td><td>1</td></tr>
                                        <tr><td>11-20 Tahun</td><td>2</td></tr>
                                        <tr><td>21-30 Tahun</td><td>3</td></tr>
                                        <tr><td>31-40 Tahun</td><td>4</td></tr>
                                        <tr><td>> 50 Tahun</td><td>5</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Serat Kayu (c5)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr><td>Tidak Berserat</td><td>1</td></tr>
                                        <tr><td>Sdikit Berserat</td><td>2</td></tr>
                                        <tr><td>Cukup Bersearat</td><td>3</td></tr>
                                        <tr><td>Berserat</td><td>4</td></tr>
                                        <tr><td>Sangat Berserat</td><td>5</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- ---------------MODAL HASIl NORMALISASI---------------- --}}
 <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Rumus Kriteria Tipe Cost (Minimasi) <br>Rumus Kriteria Tipe Benefit (Maximasi)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="assets/img/rumus1.png" class="img-fluid" alt="Gambar 1">
            <p>Rumus Kriteria Tipe Cost (Minimasi)</p>
          </div>
          <div class="col-md-6">
            <img src="assets/img/rumus2.png" class="img-fluid" alt="Gambar 2">
            <p>Rumus Kriteria Tipe Benefit (Maximasi)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection