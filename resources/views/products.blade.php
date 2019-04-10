@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product</div>
                <div class="card-body">

                <form class="form" action="{{ route('store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Chicken">
                          </div>
                          <div class="form-group">
                            <label for="quantity">Quantity In Stock</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="12">
                          </div>
                          <div class="form-group">
                            <label for="quantity">Price Per Item</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="5000">
                          </div>

                          <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-lg btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Listings</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                    <td>Product Name</td>
                                    <td>Quantity</td>
                                    <td>Price per item</td>
                                    <td>Datetime submitted</td>
                                    <td>Total Value Number</td>        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($decoded_db as $item)
                            <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity']}}</td>
                            <td>{{ $item['price']}}</td>
                            <td>{{ $item['date']}}</td>
                            <td>{{ $item['quantity'] * $item['price'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
