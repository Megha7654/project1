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

  <form method="POST" action="{{route('product.update',$product->pid)}}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="email">Product Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="productname" require value="{{$product->productname ?? ''}}">
    </div>
    <div class="form-group">
      <label for="email">Product price:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="price" require value="{{$product->price ?? ''}}">
    </div>
    <div class="form-group">
      <label for="email">Product qty:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Productname" name="qty" require value="{{$product->qty ?? ''}}">
    </div>

    <div class="form-group">
      <label for="email">Images</label>
      <img src="{{asset('storage/images/'.$product->image)}}" alt="" width="100px">
      <input type="file" class="form-control" id="email"  name="image" >
      <input type="hidden" name="hiddenimg" value="{{$product->image}}">
    </div>
    
    <input type="submit" value="submit" name="submit" class="btn btn-primary">
  </form>
</div>

@endsection