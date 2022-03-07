@extends('backend.layouts.master');

@section('content')

<div class="col-md-8 grid-margin stretch-card mx-auto">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add new product</h4>
      @include('backend.layouts.error')
      <form class="forms-sample" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name">Product Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
        </div>
        <div class="form-group">
          <label for="price">Product Price</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
        </div>
        <div class="form-group">
          <label for="description">Product Description</label>
          <textarea type="text" class="form-control" id="description" name="description" placeholder="Product Description" rows="12"> </textarea>
        </div>
        <div class="form-group">
          <input type="file" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary me-2">Add</button>
        <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>


@endsection