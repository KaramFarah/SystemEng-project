@extends('dashboard.app')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
@endsection
@section('content')
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3"><i class="fa fa-star"></i> Import Your Products DataSet Here</h3>
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
  
            <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
  
                <input type="file" name="file" class="form-control">

                <br>
                <button class="btn btn-success"><i class="fa fa-file"></i> Import Products Data</button>
            </form>
    
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="2">
                        <form action="{{ route('products.massDestroy') }}" method="POST">
                        
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger float-end" type="submit"><i class="fa fa-trash"></i> Delete All</button>

                        </form>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                </tr>
                @endforeach
            </table>
    
        </div>
    </div>
</div>
@endsection