@extends('layouts.admin-layout')

@section('title', 'Product Update')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <form method="post" enctype="multipart/form-data" action="{{ route('admin.product.update', ['id' => $product->id]) }}">
            @csrf
            <!-- Display validation errors -->
            @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="card">
              <div class="card-header">
                <h4>Product Update</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Product Name </label>
                  <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                </div>
                <div class="form-group">
                  <label>Descirption</label>
                  <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}"></textarea>
                </div>
                <div class="form-group">
                  <label>Price </label>
                  <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">
                </div>

                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" class="form-control" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                </div>

                <div class="section-title"> Image</div>
                <div class="form-group">
                  <input type="file" class="form-control" id="customFile" name="image">

                </div>
                <div class="form-group">
                  <label>Size</label>
                  <input type="text" class="form-control" name="size" value="{{ old('size', $product->size) }}">
                </div>

                <div class="form-group">
                  <label>Colour</label>
                  <input type="text" class="form-control" name="colour" value="{{ old('color', $product->colour) }}">
                </div>

                <div class="form-group">
                  <label>Sub-Category Name</label>
                  <select class="form-control" name="sub_category_id">
                    @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}" {{ old('sub_category_id', $product->id) == $subcategory->id ? 'selected' : '' }}>
                      {{ $subcategory->name }}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Brand Name</label>
                  <select class="form-control" name="brand_id">
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->id) == $brand->id ? 'selected' : '' }}>
                      {{ $brand->name }}
                    </option>
                    @endforeach
                  </select>
                </div>

                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
</div>
</div>
</section>
@endsection