@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->


                    <form action="{{ url('Store/Product/'.$products->id) }}" method="POST">
                    @csrf

    <div class="form-group">
    <label for="exampleInputEmail1">Update Product</label>
     <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
    id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $products->product_name }}">
    @error('product_name')
    <span class="text_danger">{{$message}}</span>
    @enderror

    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
