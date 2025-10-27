@extends('layouts.app')

@section('title', 'Section Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-layer-group me-2"></i>{{ $section->name }}</h2>
    <div>
        <a href="{{ route('sections.edit', $section) }}" class="btn btn-outline-primary me-2">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
        <a href="{{ route('sections.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Sections
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Section Information</h5>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Name:</dt>
                    <dd class="col-sm-9">{{ $section->name }}</dd>
                    
                    <dt class="col-sm-3">Code:</dt>
                    <dd class="col-sm-9">
                        <span class="badge bg-primary">{{ $section->code }}</span>
                    </dd>
                    
                    <dt class="col-sm-3">Description:</dt>
                    <dd class="col-sm-9">{{ $section->description ?: 'No description provided' }}</dd>
                    
                    <dt class="col-sm-3">Capacity:</dt>
                    <dd class="col-sm-9">{{ $section->capacity }} students</dd>
                    
                    <dt class="col-sm-3">Current Students:</dt>
                    <dd class="col-sm-9">{{ $section->students->count() }} students</dd>
                    
                    <dt class="col-sm-3">Created:</dt>
                    <dd class="col-sm-9">{{ $section->created_at->format('M d, Y \a\t g:i A') }}</dd>
                    
                    <dt class="col-sm-3">Last Updated:</dt>
                    <dd class="col-sm-9">{{ $section->updated_at->format('M d, Y \a\t g:i A') }}</dd>
                </dl>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Students in Section</h5>
                <a href="{{ route('students.create') }}?section={{ $section->id }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i>Add Student
                </a>
            </div>
            <div class="card-body">
                @if($section->students->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($section->students as $student)
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h6 class="mb-1">{{ $student->full_name }}</h6>
                                    <small class="text-muted">{{ $student->student_id }}</small>
                                </div>
                                <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center mb-0">No students in this section yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
