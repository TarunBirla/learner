@extends('admin.layout')

@section('content')

<div class="page-header">
    <h3>Dashboard</h3>
    <p>Welcome back! Here's what's happening with your learning platform today.</p>
</div>

<div class="row g-4">
    <!-- Card 1 - Courses -->
    <div class="col-md-6 col-lg-3">
        <div class="stats-card card-courses">
            <div class="icon-box">
                <i class="bi bi-journal-bookmark-fill"></i>
            </div>
            <h5>Total Courses</h5>
            <h2>12</h2>
            <div class="change positive">
                <i class="bi bi-arrow-up"></i> 8% from last month
            </div>
        </div>
    </div>

    <!-- Card 2 - Students -->
    <div class="col-md-6 col-lg-3">
        <div class="stats-card card-students">
            <div class="icon-box">
                <i class="bi bi-people-fill"></i>
            </div>
            <h5>Total Students</h5>
            <h2>450</h2>
            <div class="change positive">
                <i class="bi bi-arrow-up"></i> 12% from last month
            </div>
        </div>
    </div>

    <!-- Card 3 - Instructors -->
    <div class="col-md-6 col-lg-3">
        <div class="stats-card card-instructors">
            <div class="icon-box">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <h5>Instructors</h5>
            <h2>8</h2>
            <div class="change positive">
                <i class="bi bi-arrow-up"></i> 2 new this month
            </div>
        </div>
    </div>

    <!-- Card 4 - Blogs -->
    <div class="col-md-6 col-lg-3">
        <div class="stats-card card-blogs">
            <div class="icon-box">
                <i class="bi bi-newspaper"></i>
            </div>
            <h5>Blog Posts</h5>
            <h2>15</h2>
            <div class="change positive">
                <i class="bi bi-arrow-up"></i> 3 published recently
            </div>
        </div>
    </div>
</div>

@endsection