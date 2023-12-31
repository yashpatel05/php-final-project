@php
// Retrieve the authenticated user using the session
$user = App\Models\User::find(session('user_id'));
@endphp
<div class="loader"></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <nav class="navbar navbar-expand-lg main-navbar sticky">
      <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li>
            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
              <i data-feather="align-justify"></i>
            </a>
          </li>
        </ul>
      </div>
      <li class="dropdown">
        <a href="#" id="userIconLink" class="nav-link-lg nav-link-user dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-user-circle fa-2x" style="font-size: 30px;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right pullDown" id="userDropdown">
          <div class="dropdown-title">Hello {{ $user->name }}</div>
          <a href="#" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
      </ul>
    </nav>

    <div class="main-sidebar sidebar-style-2">
      <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
          <a href="{{ route('admin.dashboard') }}">
            <img alt="image" src="{{ asset('admin/assets/img/logos/theshoecompany.png') }}" style="height:75px; width:75px; padding:5px;">
          </a>
        </div>
        <ul class="sidebar-menu">
          <li class="menu-header">Main</li>
          <li class="dropdown">
            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
          </li>

          <li>
            <a href="{{ route('admin.user') }}" class="nav-link"><i data-feather="grid"></i><span>User</span></a>
          </li>

          <li>
            <a href="{{ route('admin.category') }}" class="nav-link"><i data-feather="grid"></i><span>Category</span></a>
          </li>

          <li>
            <a href="{{ route('admin.subcategory') }}" class="nav-link"><i data-feather="grid"></i><span>Sub-category</span></a>
          </li>

          <li>
            <a href="{{ route('admin.product') }}" class="nav-link"><i data-feather="grid"></i><span>Product</span></a>
          </li>

          <li>
            <a href="{{ route('admin.brand') }}" class="nav-link"><i data-feather="grid"></i><span>Brand</span></a>
          </li>

          <li>
            <a href="{{ route('admin.order-details') }}" class="nav-link"><i data-feather="grid"></i><span>Order Details</span></a>
          </li>

          <li>
            <a href="{{ route('admin.feedback') }}" class="nav-link"><i data-feather="grid"></i><span>Feedback</span></a>
          </li>

          <li>
            <a href="{{ route('admin.contact') }}" class="nav-link"><i data-feather="grid"></i><span>Contact</span></a>
          </li>
    </div>
    </aside>
  </div>