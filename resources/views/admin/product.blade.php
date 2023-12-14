@extends('layouts.admin-layout')

@section('title', 'Product')

@section('content')
@if(session()->has('success') && !empty(session('success')))
<script>
  // JavaScript for displaying the alert
  window.onload = function() {
    alert("{{ session('success') }}");
  };
</script>
@endif
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Product Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <div class="text-right">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add Product</a>
                  </div>
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Image</th>
                      <th>Size</th>
                      <th>Colour</th>
                      <th>Sub-Category Name</th>
                      <th>Brand Name</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{ $product->id }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->description }}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->quantity }}</td>
                      <td><img src="{{ asset('assets/img/product/' . $product->image) }}" height="50" width="50" style="border-radius:50%"></td>
                      <td>{{ $product->size }}</td>
                      <td>{{ $product->colour }}</td>
                      <td>{{ $product->subcategory->name }}</td>
                      <td><img src="{{ asset('assets/img/product/' . $product->brand->logo) }}" height="40" width="40" style="border-radius:50%"><br />{{ $product->brand->name }}</td>
                      <td>
                        <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}">
                          <img src="{{ asset('admin/assets/img/delete.png') }}" height="30">
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}">
                          <img src="{{ asset('admin/assets/img/update.png') }}" height="30">
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection