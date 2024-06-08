@extends('dashboard.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
@endsection
@section('content')
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3"><i class="fa fa-star"></i>Products With thier Support Values</h3>
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
  
    
            <table class="table table-bordered mt-3">
            <tr>
                    <th>Test</th>
                    <th>First Product</th>
                    <th>Second Product</th>
                    <th>Support</th>
                    <th>Confidence</th>
                </tr>
                @foreach($combonations as $item)
                <tr>
                    <td>{{ $item->test_id }}</td>
                    <td>{{ $item->product_a }}</td>
                    <td>{{ $item->product_b }}</td>
                    <td>{{ $item->support . ' %' }} </td>
                    <td>{{ $item->confidence . ' %' }} </td>
                </tr>
                @endforeach
            </table>
    
        </div>
    </div>
</div>
@endsection