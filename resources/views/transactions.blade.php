<!DOCTYPE html>
<html>
<head>
    <title>Importing page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
      
<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3"><i class="fa fa-star"></i> Here You Can Display The Transactions Of Your DataSet</h3>
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
                @if ($transaction_count <= 0)
                    <tr>
                        <th colspan="4">
                            <form action="{{ route('transactions.generate') }}" method="GET">
                                @csrf
                                <button class="btn btn-warning float-end" type="submit"><i class="fa fa-download"></i>Don't See Any Transactions Yet?</button>
                            </form>
                        </th>
                    </tr>
                @endif
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>Transaction ID</th>
                    <th>customer</th>
                    <th>Product Name</th>
                </tr>
                @foreach($transactions as $transaction)
                <tr>
                    {{-- <td>{{ $transaction->id }}</td> --}}
                    <td>{{ $transaction->transactionID }}</td>
                    <td>{{ $transaction->customer_id }}</td>
                    <td>{{ $transaction->product_name }}</td>
                </tr>
                @endforeach
            </table>
    
        </div>
    </div>
</div>
       
</body>
</html>