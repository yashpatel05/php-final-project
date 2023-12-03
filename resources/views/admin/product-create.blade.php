@extends('layouts.admin-layout')

@section('title', 'Product Add')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Product Add</h4>
                        </div>
                        <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
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
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Product Name </label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Price </label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control">
                                </div>
                                <div class="section-title"> Image</div>
                                <div class="custom-file">
                                    <input type="file" class="form-control" name="image" id="customFile">
                                </div>
                                <div class="form-group">
                                    <label>Size</label>
                                    <input type="text" name="size" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Colour</label>
                                    <input type="text" name="colour" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Subcategory Name</label>
                                    <select class="form-control" name="sub_category_id">
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <select class="form-control" name="brand_id">
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection