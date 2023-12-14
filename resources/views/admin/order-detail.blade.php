@extends('layouts.admin-layout')

@section('title', 'Order-Details')

@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Order Details Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">

                  <thead>
                    <tr>
                      <th>Order id</th>
                      <th>Date/Time</th>
                      <th>Payment Status</th>
                      <th>Order Status</th>
                      <th>User Name</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total Amount</th>
                    </tr>
                  </thead>

                  <tbody>

                    @foreach ($orders as $order)
                    @foreach ($order->orderDetails as $orderDetail)
                    <tr>
                      <td>{{ $orderDetail->id }}</td>
                      <td>{{ $order->order_date }}</td>
                      <td>{{ $order->payment_status }}</td>
                      <td>{{ $order->order_status }}</td>
                      <td>{{ $order->user->name }}</td>
                      <td>{{ $orderDetail->product->name }}</td>
                      <td>{{ $orderDetail->product->price }}</td>
                      <td>{{ $orderDetail->quantity }}</td>
                      <td>{{ $orderDetail->total_amount }}</td>
                    </tr>
                    @endforeach
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