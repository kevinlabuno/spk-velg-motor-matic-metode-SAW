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
             <h2 class="h3"><b> Pembobotan</b></h2>
          </div>
          @if (session('success'))
            <div class="alert alert-primary">{{session('success')}}</div>
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
          <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-dark">Bobot Nilai Kriteria</span>
          <span class="badge bg-dark rounded-pill"> %</span>
        </h4>
        <ul class="list-group mb-3">

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Harga (Cost)</h6>
              <small class="text-body-secondary">Bobot Harga</small>
            </div>
            <p id="harga-value" class="text-body-secondary">%</p>
            <p id="harga-value2" class="text-body-secondary"></p>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Ketahanan (Benefit)</h6>
              <small class="text-body-secondary">Bobot Ketahanan</small>
            </div>
            <p id="ketahanan-value" class="text-body-secondary">%</p>
            <p id="ketahanan-value2" class="text-body-secondary"></p>
          </li>


          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Desain (Benefit)</h6>
              <small class="text-body-secondary">Bobot Desain</small>
            </div>
            <p id="desain-value" class="text-body-secondary">%</p>
            <p id="desain-value2" class="text-body-secondary"></p>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Bahan (Benefit)</h6>
              <small class="text-body-secondary">Bobot Bahan</small>
            </div>
            <p id="bahan-value" class="text-body-secondary">%</p>
            <p id="bahan-value2" class="text-body-secondary"></p>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Ukuran (Cost)</h6>
            </div>
            <p id="ukuran-value" class="text-body-secondary">%</p>
              <p id="ukuran-value2" class="text-body-secondary"></p>
          </li>

          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Berat (Cost)</h6>
            </div>
            <p id="berat-value" class="text-body-secondary">%</p>
              <p id="berat-value2" class="text-body-secondary"></p>
          </li>

          <li class="list-group-item d-flex justify-content-between">
            <span>Total Bobot</span>
            <p id="total-value" class="text-body-secondary">%</p>
          </li>


        </ul>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Masukan Bobot Kriteria</h4>
        <form class="needs-validation" method="POST" action="{{route('bobot.post')}}">
         @csrf

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="harga" class="form-label">Harga (Cost)</label>
              <input type="number" class="form-control" id="harga" name="harga" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Masukan pembobotan.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">ketahanan (Benefit)</label>
              <input type="number" class="form-control" id="ketahanan" name="ketahanan" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Masukan ketahanan.
              </div>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Desain (Benefit)</label>
              <input type="number" class="form-control" id="desain" name="desain" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Masukan Desain.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Bahan (Benefit)</label>
              <input type="number" class="form-control" id="bahan" name="bahan" placeholder="" value="" required="">
              <div class="invalid-feedback">
                Masukan Bahan.
              </div>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Ukuran (Cost)</label>
              <input type="number" class="form-control" id="ukuran" name="ukuran" placeholder="" value="" required="">
              <div class="invalid-feedback">
                 Masukan Ukuran.
              </div>
            </div>

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Berat (Cost)</label>
              <input type="number" class="form-control" id="berat" name="berat" placeholder="" value="" required="">
              <div class="invalid-feedback">
                 Masukan Berat.
              </div>
            </div>

          </div>

          <hr class="my-4">
          <h5 class="mb-3">Total bobot semua kriteria harus 100%</h5>
          <hr class="my-4">

          <button class="w-100 btn btn-dark btn-lg" type="submit">Proses Perhitungan</button>
        </form>
      </div>
    </div>
    

</main>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', (event) => {
    const updateValues = [
        { inputId: 'harga', valueId: 'harga-value', valueId2: 'harga-value2' },
        { inputId: 'ketahanan', valueId: 'ketahanan-value', valueId2: 'ketahanan-value2' },
        { inputId: 'desain', valueId: 'desain-value', valueId2: 'desain-value2' },
        { inputId: 'bahan', valueId: 'bahan-value', valueId2: 'bahan-value2' },
        { inputId: 'ukuran', valueId: 'ukuran-value', valueId2: 'ukuran-value2' },
        { inputId: 'berat', valueId: 'berat-value', valueId2: 'berat-value2' }
    ];

    function updateTotal() {
        let total = 0;
        updateValues.forEach(({ inputId }) => {
            const inputElement = document.getElementById(inputId);
            total += parseFloat(inputElement.value) || 0; // Add input value to total
        });
        document.getElementById('total-value').textContent = total + ' %';
    }

    updateValues.forEach(({ inputId, valueId, valueId2 }) => {
        const inputElement = document.getElementById(inputId);
        const valueElement = document.getElementById(valueId);
        const valueElement2 = document.getElementById(valueId2);

        inputElement.addEventListener('input', function () {
            const value = inputElement.value;
            valueElement.textContent = value + ' %';
            valueElement2.textContent = 'w (' + value / 100 + ')';
            updateTotal();
        });
    });

    updateTotal();
});

</script>
@endsection