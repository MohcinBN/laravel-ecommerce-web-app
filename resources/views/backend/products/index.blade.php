@extends('backend.layouts.master');

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Products List</h4>
      <p class="card-description">
        You will find all your products below
      </p>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Product Price</th>
              <th>Product Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><img src="{{ url('uplaods') . '/' . $product->image }}" alt="{{ $product->image }}" style="width: 50px; height: 50px;"></td>
                <td>Actions</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection