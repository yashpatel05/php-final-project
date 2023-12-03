@extends('layouts.admin-layout')

@section('title', 'User')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>User Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Country</th>
                      <th>Contact No</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->street_address }}, {{ $user->city }}, {{ $user->state }}, {{ $user->postal_code }}</td>
                      <td>{{ $user->country }}</td>
                      <td>{{ $user->contact_no }}</td>
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