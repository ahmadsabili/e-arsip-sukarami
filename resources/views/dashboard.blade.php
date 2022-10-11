@extends('layouts.main', ['header' => 'Dashboard'])

@section('content-header')

@endsection

@section('content')
  <div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100 bg-primary">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">Triwulan</div>
              <div class="h5 mb-0 font-weight-bold text-light">23</div>
              {{-- <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span>Since last month</span>
              </div> --}}
            </div>
            <div class="col-auto">
              <i class="fas fa-file-invoice fa-2x text-light"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100 bg-success">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">UMKM</div>
              <div class="h5 mb-0 font-weight-bold text-light">45</div>
              {{-- <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                <span>Since last years</span>
              </div> --}}
            </div>
            <div class="col-auto">
              <i class="fas fa-store fa-2x text-light"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100 bg-warning">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">Bansos</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-light">342</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                {{-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                <span>Since last month</span> --}}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-light"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100 bg-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">Pembangunan Masjid</div>
              <div class="h5 mb-0 font-weight-bold text-light">20</div>
              {{-- <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span>Since yesterday</span>
              </div> --}}
            </div>
            <div class="col-auto">
              <i class="fas fa-mosque fa-2x text-light"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body bg-success">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">Monography</div>
              <div class="h5 mb-0 font-weight-bold text-light">8</div>
              {{-- <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span>Since yesterday</span>
              </div> --}}
            </div>
            <div class="col-auto">
              <i class="fas fa-book-open fa-2x text-light"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100 bg-warning">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">PAUD</div>
              <div class="h5 mb-0 font-weight-bold text-light">12</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                {{-- <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                <span>Since yesterday</span> --}}
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard-teacher fa-2x text-light"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('js')
  @if (Session::has('success'))
  <script>
      toastr.success("{{ Session::get('success') }}");
  </script>
  @endif
@endsection