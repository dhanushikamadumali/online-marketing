@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/assets/plugins/userdashboard.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<style>
    .nav-link.active {
        border-left: 3px solid blue; 
        padding-left: 10px; 
    }
    .sidebar {
        background-color: #f8f9fa;
        padding: 15px;
    }
</style>

<div class="container mt-4 mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Account</li>
        </ol>
    </nav>

    <div class="row dashboard-container">
        <!-- Sidebar toggle button -->
        <div class="d-flex justify-content-start">
            <button class="btn btn-sm d-md-none mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars fa-lg"></i>
            </button>
        </div>

        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: white;">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mt-2">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('edit-profile') ? 'active' : '' }}" href="{{ route('edit-profile') }}">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('myorders') ? 'active' : '' }}" href="{{ route('myorders') }}">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('myreviews') ? 'active' : '' }}" href="{{ route('myreviews') }}">My Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('addresses') ? 'active' : '' }}" href="{{ route('addresses') }}">Address Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('change-password') ? 'active' : '' }}" href="{{ route('change-password') }}">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
            <div class="card1">
                <div class="card-body card-container">
                    @yield('dashboard-content')
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endsection
