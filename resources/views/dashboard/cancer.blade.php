@extends('dashboard.app')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Importing page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <h3 class="card-header p-3"><i class="fa fa-star"></i>Import Oral Cancer DataSet Here</h3>
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

                <form action="{{ route('dashboard.knn.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="file" class="form-control">

                    <br>
                    <button class="btn btn-success"><i class="fa fa-file"></i>Import Oral Cancer Data</button>
                </form>

                <table class="table table-bordered mt-3">
                    <tr>
                        <th colspan="7">
                            <div style="display: flex;justify-content: flex-end;gap: 20px;">
                                <form action="{{ route('dashboard.knn.massDestroy') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger block" type="submit"><i class="fa fa-trash"></i>
                                        Delete All</button>



                                </form>
                                <form action="{{ route('dashboard.knn.test') }}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-success block" type="submit"><i class="fa fa-trash"></i>
                                        Test Case</button>



                                </form>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Survival Time (days)</th>
                        <th>Mutations</th>
                        <th>Mutated Genes</th>
                        <th>Tumor Stage</th>
                        {{-- <th>product_id</th>
                        <th>quantity</th> --}}
                    </tr>
                    @foreach($knns as $knn)
                        <tr>
                            <td>{{ $knn->id }}</td>
                            <td>{{ $knn->gender ? 'female' : 'male' }}</td>
                            <td>{{ $knn->age }}</td>
                            <td>{{ $knn->survival_time }}</td>
                            <td>{{ $knn->mutations }}</td>
                            <td>{{ $knn->mutated_genes }}</td>
                            <td>{{ $knn->tumor_stage }}</td>
                            {{-- <td>{{ $product->product_id }}</td>
                            <td>{{ $product->quantity }}</td> --}}
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

</html>
@endsection