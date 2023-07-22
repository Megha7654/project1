@extends('Admin.dashbord')
@section('content')
<h1>Product </h1>
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="email">Product Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="productname" >
    </div>
    <div class="form-group">
      <label for="email">Product price:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="price" >
    </div>
    <div class="form-group">
      <label for="email">Product qty:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="qty" >
    </div>
    <div class="form-group">
      <label for="file">Image:</label>
      <input type="file" class="form-control" id="email"  name="image" >
    </div>
    
    <input type="submit" value="submit" name="submit" class="btn btn-primary">
  </form>
</div>

@endsection