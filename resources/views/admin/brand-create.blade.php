@extends('layouts.admin-layout')

@section('title', 'Brand Add')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <form enctype="multipart/form-data" method="post" action="{{ route('admin.brand.store') }}">
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
                <h4>Brand Add</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label>Brand Name</label>
                  <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                  <label>Brand Logo</label>
                  <input type="file" class="form-control" name="image" id="customFile">
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
      </form>
    </div>
</div>
</section>
@endsection