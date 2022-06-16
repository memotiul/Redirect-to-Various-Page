@extends('profile')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
  <div class="card">
        <div class="card-header text-center font-weight-bold">
      <h2>Add Branches</h2>
    </div>
    <div class="card-body">
  <form action="{{ route('branch.add') }}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Amount</label>
          <input type="text" id="amount" name="amount" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>    
</body>
</html>
@endsection

