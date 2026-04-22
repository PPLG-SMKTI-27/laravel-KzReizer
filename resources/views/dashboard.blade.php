@extends('layouts.dashboard')

@section('content')

<div class="dashboard">
    <div class="dashboard-header">
        <h1>Dashboard</h1>
        <div class="user-menu">
            <a href="{{ route('profile.edit') }}" class="btn-profile">
                {{ Auth::user()->name }}
            </a>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <div class="stats">
        <div class="card">
            <h3>Total Skills</h3>
            <p>{{ $totalSkills }}</p>
        </div>

        <div class="card">
            <h3>Total Projects</h3>
            <p>{{ $totalProjects }}</p>
        </div>

        <div class="card">
            <h3>Total Mobil</h3>
            <p>{{ $totalCars }}</p>
        </div>

        <div class="card">
            <h3>Ready Stock</h3>
            <p>{{ $readyStock }}</p>
        </div>

        <div class="card">
            <h3>Order Baru</h3>
            <p>{{ $newOrders }}</p>
        </div>

        <div class="card">
            <h3>Deal Selesai</h3>
            <p>{{ $completedOrders }}</p>
        </div>
    </div>

    <div class="latest">
        <h2>Latest Projects</h2>

        @forelse ($latestProjects as $project)
            <div class="project-item">
                <h4>{{ $project->title }}</h4>
                <p>{{ $project->description }}</p>
            </div>
        @empty
            <p>No projects yet.</p>
        @endforelse
    </div>

    <div class="latest mt-6">
        <h2>Latest Orders</h2>

        @forelse ($latestOrders as $order)
            <div class="project-item">
                <h4>{{ $order->order_code }} - {{ $order->customer_name }}</h4>
                <p>{{ $order->car->name ?? '-' }} | Status: {{ ucfirst($order->status) }}</p>
            </div>
        @empty
            <p>No orders yet.</p>
        @endforelse
    </div>

</div>

@endsection
