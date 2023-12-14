@extends('layouts.admin-layout')

@section('title', 'Contact')

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
              <h4>Contact Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Problem Solved</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                      <td>{{ $contact->id }}</td>
                      <td>{{ $contact->name }}</td>
                      <td>{{ $contact->phone }}</td>
                      <td>{{ $contact->email }}</td>
                      <td>{{ $contact->subject }}</td>
                      <td>{{ $contact->message }}</td>
                      <td>{{ $contact->created_at }}</td>
                      <td>{{ $contact->updated_at }}</td>
                      <td>
                        <form method="POST" action="{{ route('admin.contact.markSolved', ['id' => $contact->id]) }}">
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
                          <textarea name="admin_message" id="admin_message" rows="4" cols="50" required></textarea>
                          <br>
                          <button type="submit" style="color: #18F70D; cursor: pointer">Mark as Solved</button>
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