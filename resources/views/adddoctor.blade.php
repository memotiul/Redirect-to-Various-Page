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
      <h2>Add Doctors</h2>
    </div>
    <div class="card-body">
  <form action="{{ route('doctor.add') }}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Mobile</label>
          <input type="text" id="mobile" name="mobile" class="form-control" required="">
        </div>
       <div class="form-group">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="text" id="email" name="email" class="form-control" required="">
        </div>
       <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input type="password" id="password" name="password" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>    
</body>
</html>
@endsection

