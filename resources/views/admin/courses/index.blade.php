@extends('admin.layout')

@section('content')

<style>
    .page-title-box {
        background: white;
        padding: 20px 25px;
        border-radius: 10px;
        margin-bottom: 25px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .page-title-box h3 {
        margin: 0;
        color: #1a1d29;
        font-weight: 700;
    }

    .btn-add-course {
        background: #5fcf80;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add-course:hover {
        background: #4ab56e;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(95, 207, 128, 0.3);
    }

    .courses-table-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .courses-table {
        margin: 0;
        width: 100%;
    }

    .courses-table thead {
        background: linear-gradient(135deg, #1a1d29 0%, #2a2d3a 100%);
    }

    .courses-table thead th {
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 0.5px;
        padding: 15px 20px;
        border: none;
    }

    .courses-table tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }

    .courses-table tbody tr:hover {
        background: #f8f9fa;
        transform: scale(1.01);
    }

    .courses-table tbody td {
        padding: 15px 20px;
        vertical-align: middle;
        color: #495057;
    }

    .course-id-badge {
        background: #e9ecef;
        color: #495057;
        padding: 5px 12px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 13px;
    }

    .course-title {
        font-weight: 600;
        color: #1a1d29;
        max-width: 300px;
    }

    .course-price {
        color: #5fcf80;
        font-weight: 700;
        font-size: 16px;
    }

    .course-image {
        width: 70px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-edit {
        background: #ffc107;
        color: white;
        border: none;
        padding: 6px 15px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-edit:hover {
        background: #e0a800;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
    }

    .btn-delete {
        background: #e74c3c;
        color: white;
        border: none;
        padding: 6px 15px;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .btn-delete:hover {
        background: #c0392b;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
    }

    .no-courses {
        text-align: center;
        padding: 50px 20px;
        color: #6c757d;
    }

    .no-courses i {
        font-size: 60px;
        color: #dee2e6;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .page-title-box {
            flex-direction: column;
            gap: 15px;
        }

        .action-buttons {
            flex-direction: column;
        }
    }
</style>

<div class="page-title-box d-flex justify-content-between align-items-center">
    <div>
        <h3><i class="bi bi-journal-bookmark-fill me-2"></i>Manage Courses</h3>
        <p class="text-muted mb-0" style="font-size: 14px;">
            Total Courses: <strong>{{ count($courses) }}</strong>
        </p>
    </div>
    <a href="/admin/courses/create" class="btn-add-course">
        <i class="bi bi-plus-circle"></i> Add New Course
    </a>
</div>

<div class="courses-table-card">
    <div class="table-responsive">
        <table class="courses-table table table-hover mb-0">
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>Course Title</th>
                    <th style="width: 120px;">Price</th>
                    <th style="width: 100px;">Thumbnail</th>
                    <th style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>
                        <span class="course-id-badge">#{{ $course['id'] }}</span>
                    </td>
                    <td>
                        <div class="course-title">{{ $course['title'] }}</div>
                    </td>
                    <td>
                        <span class="course-price">₹{{ $course['price'] }}</span>
                    </td>
                    <td>
                        <img src="{{ asset('uploads/'.$course['image']) }}" 
                             alt="{{ $course['title'] }}"
                             class="course-image">
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="/admin/courses/{{ $course['id'] }}/edit" 
                               class="btn-edit">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="/admin/courses/delete/{{ $course['id'] }}" 
                               class="btn-delete"
                               onclick="return confirm('Are you sure you want to delete this course?')">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <div class="no-courses">
                            <i class="bi bi-inbox"></i>
                            <h5>No Courses Found</h5>
                            <p>Start by adding your first course</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection