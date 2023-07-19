@extends('Admin.dashbord')
@section('content')
@if(Session::has('success'))
<div class="alert alert-primary" role="alert">
{{Session::get('success')}}
</div>
@endif
<h1>Product </h1>
<a href="{{route('product.create')}}" class ="btn btn-primary">Add New Product</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <td>ProductName</td>
            <td>Price</td>
            <td>Qty</td>
            <td>action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($product as $key)
            <tr>
                <td>{{$key->productname}}</td>
                <td>{{$key->price}}</td>
                <td>{{$key->qty}}</td>
                <td><form method="POST" action="{{route('product.destroy',$key->pid)}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" class="btn btn-danger">
                </form></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection