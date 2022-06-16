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
      <h2>Add Staff</h2>
    </div>
    <div class="card-body">
 <form action="customadd" method="POST">
   <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea type="text" id="description" name="description" class="form-control" required=""></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Status</label>
          <input type="text" id="status" name="status" class="form-control" required="">
        </div>
        <div class="form-group">
           <input type="submit" class="btn btn-success" />
       </div>
      </form>
    </div>
  </div>
</div>    
</body>
</html>
@endsection



