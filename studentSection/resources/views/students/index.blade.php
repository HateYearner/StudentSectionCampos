@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title"><i class="fas fa-users me-3"></i>Students</h1>
        <p class="text-muted mb-0">Manage student information and track enrollment across sections</p>
    </div>
    <a href="{{ route('students.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus me-2"></i>Add New Student
    </a>
</div>

@if($students->count() > 0)
<div class="row mb-4">
    <div class="col-md-3">
        <div class="stats-card">
            <div class="stats-number">{{ $students->count() }}</div>
            <div class="stats-label">Total Students</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #10b981, #059669);">
            <div class="stats-number">{{ $students->groupBy('section_id')->count() }}</div>
            <div class="stats-label">Active Sections</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
            <div class="stats-number">{{ $students->whereNotNull('date_of_birth')->count() }}</div>
            <div class="stats-label">With Birth Dates</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed);">
            <div class="stats-number">{{ $students->whereNotNull('phone')->count() }}</div>
            <div class="stats-label">With Phone Numbers</div>
        </div>
    </div>
</div>
@endif

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="border-0">Student</th>
                        <th class="border-0">Contact</th>
                        <th class="border-0">Section</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; font-size: 18px; font-weight: 600;">
                                        {{ strtoupper(substr($student->first_name, 0, 1)) }}{{ strtoupper(substr($student->last_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $student->full_name }}</div>
                                        <div class="text-muted small">
                                            <span class="badge bg-light text-dark">{{ $student->student_id }}</span>
                                            @if($student->date_of_birth)
                                                <span class="ms-2">Born {{ $student->date_of_birth->format('M d, Y') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <div class="fw-medium">
                                        <a href="mailto:{{ $student->email }}" class="text-decoration-none text-dark">
                                            <i class="fas fa-envelope me-1 text-muted"></i>{{ $student->email }}
                                        </a>
                                    </div>
                                    @if($student->phone)
                                        <div class="text-muted small">
                                            <i class="fas fa-phone me-1"></i>{{ $student->phone }}
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('sections.show', $student->section) }}" class="text-decoration-none">
                                    <span class="badge bg-primary">{{ $student->section->name }}</span>
                                    <div class="text-muted small mt-1">{{ $student->section->code }}</div>
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle me-1"></i>Active
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-primary" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this student?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">No students found</h4>
                        <p class="text-muted">Get started by adding your first student.</p>
                        <a href="{{ route('students.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Add First Student
                        </a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($students->hasPages())
    <div class="d-flex justify-content-center">
        {{ $students->links() }}
    </div>
@endif

<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    font-size: 14px;
}

/* Enhanced button group styling */
.btn-group .btn {
    border-radius: 8px;
    margin: 0 2px;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.btn-group .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.btn-group .btn-outline-primary:hover {
    background-color: #6366f1;
    border-color: #6366f1;
    color: white;
}

.btn-group .btn-outline-warning:hover {
    background-color: #f59e0b;
    border-color: #f59e0b;
    color: white;
}

.btn-group .btn-outline-info:hover {
    background-color: #06b6d4;
    border-color: #06b6d4;
    color: white;
}

.btn-group .btn-outline-success:hover {
    background-color: #10b981;
    border-color: #10b981;
    color: white;
}

.btn-group .btn-outline-danger:hover {
    background-color: #ef4444;
    border-color: #ef4444;
    color: white;
}

.btn-group .btn:first-child {
    margin-left: 0;
}

.btn-group .btn:last-child {
    margin-right: 0;
}
</style>
@endsection
