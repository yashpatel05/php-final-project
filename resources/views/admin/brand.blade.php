@extends('layouts.admin-layout')

@section('title', 'Brand')

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
              <h4>Brand Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="dt-buttons btn-group">
                </div>
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <div class="text-right">
                    <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">Add Brand</a>
                  </div>
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Logo</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($brands as $brand)
                    <tr>
                      <td>{{ $brand->id }}</td>
                      <td>{{ $brand->name }}</td>
                      <td><img src="{{ asset('assets/img/product/' . $brand->logo) }}" height="50" width="50" style="border-radius:50%"></td>
                      <td><a href="{{ route('admin.brand.delete', ['id' => $brand->id]) }}"><img src="{{ asset('admin/assets/img/delete.png') }}" height="30"></a></td>
                      <td><a href="{{ route('admin.brand.edit', ['id' => $brand->id]) }}"><img src="{{ asset('admin/assets/img/update.png') }}" height="30"></a></td>
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