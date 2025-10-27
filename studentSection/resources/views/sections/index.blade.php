@extends('layouts.app')

@section('title', 'Sections')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title"><i class="fas fa-layer-group me-3"></i>Sections</h1>
        <p class="text-muted mb-0">Manage your academic sections and track student enrollment</p>
    </div>
    <a href="{{ route('sections.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus me-2"></i>Add New Section
    </a>
</div>

@if($sections->count() > 0)
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="stats-card">
            <div class="stats-number">{{ $sections->count() }}</div>
            <div class="stats-label">Total Sections</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #10b981, #059669);">
            <div class="stats-number">{{ $sections->sum('students_count') }}</div>
            <div class="stats-label">Total Students</div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
            <div class="stats-number">{{ $sections->sum('capacity') }}</div>
            <div class="stats-label">Total Capacity</div>
        </div>
    </div>
    
</div>
@endif

<div class="row">
    @forelse($sections as $section)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h5 class="card-title mb-1">{{ $section->name }}</h5>
                            <span class="badge bg-primary">{{ $section->code }}</span>
                        </div>
                        <div class="btn-group" role="group">
                            <a href="{{ route('sections.show', $section) }}" class="btn btn-sm btn-outline-primary" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('sections.edit', $section) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('sections.destroy', $section) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"
                                        onclick="return confirm('Are you sure you want to delete this section?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <p class="card-text text-muted flex-grow-1">{{ Str::limit($section->description, 100) ?: 'No description provided' }}</p>
                    
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <div class="progress flex-grow-1 me-3" style="height: 8px;">
                                    <div class="progress-bar" role="progressbar" 
                                         style="width: {{ ($section->students_count / $section->capacity) * 100 }}%"
                                         aria-valuenow="{{ $section->students_count }}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="{{ $section->capacity }}">
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted fw-bold">
                                {{ $section->students_count }}/{{ $section->capacity }}
                            </small>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">
                                <i class="fas fa-users me-1"></i>
                                {{ $section->students_count }} students
                            </small>
                            <a href="{{ route('sections.show', $section) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-arrow-right me-1"></i>View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-layer-group fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No sections found</h4>
                <p class="text-muted">Get started by creating your first section.</p>
                <a href="{{ route('sections.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Create First Section
                </a>
            </div>
        </div>
    @endforelse
</div>

@if($sections->hasPages())
    <div class="d-flex justify-content-center">
        {{ $sections->links() }}
    </div>
@endif

<style>
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
