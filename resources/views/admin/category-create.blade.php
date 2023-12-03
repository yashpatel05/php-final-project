@extends('layouts.admin-layout')

@section('title', 'Category Add')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <form method="post" action="{{ route('admin.category.store') }}">
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
                <h4>Category Add</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" class="form-control"></textarea>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>
  </section>
</div>
@endsection