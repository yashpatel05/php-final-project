@extends('layouts.admin-layout')

@section('title', 'The Shoe Company - Admin Dashboard')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="row">
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Order</h5>
                    <h2 class="mb-3 font-18">{{ $orderCount }}</h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Users</h5>
                    <h2 class="mb-3 font-18">{{ $userCount }}</h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/1.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Product</h5>
                    <h2 class="mb-3 font-18">{{ $productCount }}</h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/3.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                  <div class="card-content">
                    <h5 class="font-15">Feedback</h5>
                    <h2 class="mb-3 font-18">{{ $feedbackCount }}</h2>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                  <div class="banner-img">
                    <img src="assets/img/banner/4.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Order Table</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th class="text-center">
                    <div class="custom-checkbox custom-checkbox-table custom-control">
                      <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                      <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>
                  </th>
                  <th>Order id</th>
                  <th>Order Description</th>
                  <th>Order Date/Time</th>
                  <th>Payment Status</th>
                  <th>User Name</th>
                  <th>Order Status</th>
                  <th>Action</th>

                  @foreach ($orders as $order)
                <tr>
                  <td></td>
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->description }}</td>
                  <td>{{ $order->order_date }}</td>
                  <td>{{ $order->payment_status }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>{{ $order->order_status }}</td>
                  <td>
                    @if ($order->order_status == 0)
                    {{--
                          <a href="{{ route('order.accept', ['id' => $order->Order_id, 'uid' => $order->User_id]) }}" style="color: #18F70D; cursor: pointer">ACCEPT</a>
                    &nbsp;
                    <a href="{{ route('order.reject', ['id' => $order->Order_id, 'uid' => $order->User_id]) }}" style="color: red; cursor: pointer">REJECT</a>
                    --}}

                    <a href="#" style="color: #18F70D; cursor: pointer">ACCEPT</a> &nbsp;
                    <a href="#" style="color: red; cursor: pointer">REJECT</a>
                    @elseif ($order->order_status == 1)
                    <h6 style="color: #18F70D">ACCEPTED</h6>
                    @elseif ($order->order_status == 2)
                    <h6 style="color: red">REJECTED</h6>
                    @endif
                  </td>
                </tr>
                @endforeach
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection