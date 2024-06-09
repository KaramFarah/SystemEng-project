
@extends('dashboard.app')
@section('content')
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Sales <span>| Today</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-layout-text-sidebar"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$salesCount}}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="card-body">
              <h5 class="card-title">Products <span>| This Month</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-minecart-loaded"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$products}}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Top Selling -->
        <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">
              <h5 class="card-title">Top Selling <span>| Today</span></h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Product</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- {{dd($topSelling)}} --}}
                  @foreach ($topSelling as $item)
                    <tr>
                      <td>{{$item->product_a}}</td>
                      <td><a href="{{route('dashboard.single-product', ['product' => $item->firstProduct])}}"
                        class="text-primary fw-bold">+ Add to Cart</a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Top Selling -->
        <hr>
        <div class="col-6">
          <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Examined Cases</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-virus"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$examinedCases}}</h6>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-6">
          <div class="card info-card red-card">

            <div class="card-body">
              <h5 class="card-title">Exist Cases</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-virus"></i>
                </div>
                <div class="ps-3">
                  <h6>{{$existCases}}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->

      </div>
</section>
@endsection