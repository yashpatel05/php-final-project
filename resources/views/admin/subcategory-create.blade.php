@extends('layouts.admin-layout')

@section('title', 'Sub-Category Add')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <form method="post" action="{{ route('admin.subcategory.store') }}">
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
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Sub-Category Add</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sub-Category Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div><br>
                                <div class="form-group">
                                    <label for="description">Description</label> &nbsp;
                                    <input type="text" name="description" class="form-control">
                                </div><br>
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select class="form-control" name="category">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                <button class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>
</div>
@endsection