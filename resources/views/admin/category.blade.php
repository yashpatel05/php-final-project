@extends('layouts.admin-layout')

@section('title', 'Category')

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
              <h4>Category Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">


                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <a href="{{ route('admin.category.create') }}">Add Category</a>
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->description }}</td>
                      <td>
                        <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}">
                          <img src="{{ asset('admin/assets/img/delete.png') }}" height="30">
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}">
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