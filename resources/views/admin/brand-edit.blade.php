@extends('layouts.admin-layout')

@section('title', 'Brand Update')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <form enctype="multipart/form-data" method="post" action="{{ route('admin.brand.update') }}">
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
                <h4>Brand Update</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Brand Name</label>
                  <input type="text" class="form-control" name="name" value="{{ brand->name }}">
                </div>

                <div class="section-title"> Logo</div>
                <div class="form-control">
                  <input type="file" class="form-control" id="customFile" name="logo">
                  <label class="custom-file-label" for="customFile">Choose file</label>
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