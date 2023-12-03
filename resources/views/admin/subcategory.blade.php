@extends('layouts.admin-layout')

@section('title', 'Sub-Category')

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
              <h4>Sub-category Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <a href="{{ route('admin.subcategory.create') }}">Add Sub-Category</a>
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Category Name</th>
                      <th>Sub Category Name</th>
                      <th>Description</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subCategories as $subCategory)
                    <tr>
                      <td>{{ $subCategory->id }}</td>
                      <td>{{ $subCategory->category->name }}</td>
                      <td>{{ $subCategory->name }}</td>
                      <td>{{ $subCategory->description }}</td>
                      <td>
                        <a href="{{ route('admin.subcategory.delete', ['id' => $subCategory->id]) }}">
                          <img src="{{ asset('admin/assets/img/delete.png') }}" height="30">
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('admin.subcategory.edit', ['id' => $subCategory->id]) }}">
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