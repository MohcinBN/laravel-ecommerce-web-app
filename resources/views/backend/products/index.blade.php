@extends('backend.layouts.master');

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Products List</h4>
      <p class="card-description">
        You will find all your products below
      </p>
      @include('backend.layouts.error')
      @include('backend.layouts.success')
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
                <td>{{ $product->price }} $</td>
                <td><img src="{{ url('uplaods') . '/' . $product->image }}" alt="{{ $product->image }}" style="width: 50px; height: 50px;"></td>
                <td >
                  <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit"<i class="mdi mdi-delete" style="font-size: 27px; color: red"></i> Delete</button>
                  </form>
                  <a href="{{ route('product.edit', $product->id) }}"><i class="mdi mdi-tooltip-edit" style="font-size: 27px;"></i> Edit</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection