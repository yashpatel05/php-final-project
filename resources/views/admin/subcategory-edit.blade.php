@extends('layouts.admin-layout')

@section('title', 'Sub-Category Update')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <form method="post" action="{{ route('admin.subcategory.update', ['id' => $subCategory->id]) }}">
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
                                <h4>Sub-Category Update</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sub-Category Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $subCategory->name) }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" value="{{ old('description', $subCategory->description) }}">
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category', $subCategory->id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <button class="btn btn-secondary" type="reset">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection