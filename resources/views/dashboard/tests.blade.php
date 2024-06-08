@extends('dashboard.app')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
@endsection
@section('content')
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3"><i class="fa fa-star"></i> Pleas Insert Your Parameters</h3>
        <div class="card-body">
  
            @session('success')
                <div class="alert alert-success" role="alert"> 
                    {{ $value }}
                </div>
            @endsession
  
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              
            <form action="{{ route('tests.generate') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <label class="form-control" style="border: none" for="min_supp">Min Support</label>
                        <input class="form-control" type="text" name="min_supp" id="min_supp">
                    </div>
                    <div class="col">
                        <label class="form-control" style="border: none" for="min_supp">Min Confidence</label>
                        <input class="form-control" type="text" name="min_conf" id="min_conf">
                    </div>
                </div>

                <br>
                <button class="btn btn-success"><i class="fa fa-file"></i> Submit Parameters</button>
            </form>
    
        </div>
    </div>
</div>
@endsection