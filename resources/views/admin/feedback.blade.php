@extends('layouts.admin-layout')

@section('title', 'Feedback')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Feedback Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>User Name</th>
                      <th>Product Name</th>
                      <th>Feedback</th>
                      <th>Date</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($feedbacks as $feedback)
                    <tr>
                      <td>{{ $feedback->id }}</td>
                      <td>{{ $feedback->user->name }}</td>
                      <td>{{ $feedback->product->name }}</td>
                      <td>{{ $feedback->feedback }}</td>
                      <td>{{ $feedback->date }}</td>
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