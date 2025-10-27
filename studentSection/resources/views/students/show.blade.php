@extends('layouts.app')

@section('title', 'Student Details')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-user me-2"></i>{{ $student->full_name }}</h2>
    <div>
        <a href="{{ route('students.edit', $student) }}" class="btn btn-outline-primary me-2">
            <i class="fas fa-edit me-1"></i>Edit
        </a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>Back to Students
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Student Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">Student ID:</dt>
                            <dd class="col-sm-8">
                                <span class="badge bg-secondary">{{ $student->student_id }}</span>
                            </dd>
                            
                            <dt class="col-sm-4">First Name:</dt>
                            <dd class="col-sm-8">{{ $student->first_name }}</dd>
                            
                            <dt class="col-sm-4">Last Name:</dt>
                            <dd class="col-sm-8">{{ $student->last_name }}</dd>
                            
                            <dt class="col-sm-4">Email:</dt>
                            <dd class="col-sm-8">
                                <a href="mailto:{{ $student->email }}" class="text-decoration-none">
                                    {{ $student->email }}
                                </a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">Date of Birth:</dt>
                            <dd class="col-sm-8">
                                {{ $student->date_of_birth ? $student->date_of_birth->format('M d, Y') : 'Not provided' }}
                            </dd>
                            
                            <dt class="col-sm-4">Phone:</dt>
                            <dd class="col-sm-8">{{ $student->phone ?: 'Not provided' }}</dd>
                            
                            <dt class="col-sm-4">Section:</dt>
                            <dd class="col-sm-8">
                                <a href="{{ route('sections.show', $student->section) }}" class="text-decoration-none">
                                    <span class="badge bg-info">{{ $student->section->name }} ({{ $student->section->code }})</span>
                                </a>
                            </dd>
                            
                            <dt class="col-sm-4">Enrolled:</dt>
                            <dd class="col-sm-8">{{ $student->created_at->format('M d, Y \a\t g:i A') }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Section Details</h5>
            </div>
            <div class="card-body">
                <h6>{{ $student->section->name }}</h6>
                <p class="text-muted mb-2">{{ $student->section->description ?: 'No description available' }}</p>
                <div class="d-flex justify-content-between">
                    <small class="text-muted">Code: {{ $student->section->code }}</small>
                    <small class="text-muted">Capacity: {{ $student->section->students->count() }}/{{ $student->section->capacity }}</small>
                </div>
                <div class="mt-3">
                    <a href="{{ route('sections.show', $student->section) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-eye me-1"></i>View Section
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-edit me-1"></i>Edit Student
                    </a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
