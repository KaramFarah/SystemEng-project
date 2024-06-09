@extends('dashboard.app')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
@endsection
@section('content')
<div class="col-3">
    <div class="card info-card revenue-card">

        <div class="card-body">
        <h5 class="card-title">in Your <span>| Cart</span></h5>

        <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-minecart-loaded"></i>
            </div>
            <div class="ps-3">
            <h6>{{$product->name}}</h6>
            </div>
            <div class="ps-3">
            {{-- <h6>+add to cart</h6> --}}
            </div>
        </div>
        </div>

    </div>
</div>

<br>
<h3>Forgot Somthing?</h3>
{{-- {{dd($sugestion)}} --}}
@foreach ($sugestion as $item)
    <div class="col-3">
        <div class="card info-card revenue-card">

            <div class="card-body">

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-minecart-loaded"></i>
                </div>
                <div class="ps-3">
                <h6>{{$item->secondProduct->name}}</h6>
                </div>
                <div class="ps-3">
                <h6>+add to cart</h6>
                </div>
            </div>
            </div>

        </div>
    </div>
@endforeach


@endsection