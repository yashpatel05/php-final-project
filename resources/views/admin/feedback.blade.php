@extends('layouts.admin-layout')

@section('title', 'Feedback')

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
                      <th>Send Message</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($feedbacks as $feedback)
                    <tr>
                      <td>{{ $feedback->id }}</td>
                      <td>{{ $feedback->user->name }}</td>
                      <td>{{ $feedback->product->name }}</td>
                      <td>{{ $feedback->feedback }}</td>
                      <td>{{ $feedback->created_at }}</td>
                      <td>
                        <form method="POST" action="{{ route('admin.feedback-reply', ['id' => $feedback->id]) }}">
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
                          <label for="admin_message">Admin Message:</label>
                          <textarea name="admin_message_text" id="admin_message_text" rows="4" cols="50" required></textarea>
                          <br>
                          <button type="submit" style="color: #18F70D; cursor: pointer">Send Message</button>
                        </form>
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