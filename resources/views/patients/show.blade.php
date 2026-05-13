@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Patient Details: {{ $patient->first_name }} {{ $patient->last_name }}</h1>
                <div>
                    <a href="{{ route('patients.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning ms-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Personal Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>First Name:</strong> {{ $patient->first_name }}</p>
                                    <p><strong>Last Name:</strong> {{ $patient->last_name }}</p>
                                    <p><strong>Email:</strong> {{ $patient->email }}</p>
                                    <p><strong>Phone:</strong> {{ $patient->phone ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Date of Birth:</strong> {{ $patient->date_of_birth->format('M d, Y') }}</p>
                                    <p><strong>Age:</strong> {{ $patient->date_of_birth->age }} years</p>
                                    <p><strong>Gender:</strong> {{ ucfirst($patient->gender) }}</p>
                                    <p><strong>Blood Group:</strong> {{ $patient->blood_group ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Address Information</h4>
                        </div>
                        <div class="card-body">
                            @if($patient->address || $patient->city || $patient->state || $patient->postal_code)
                                <p><strong>Address:</strong> {{ $patient->address ?? 'N/A' }}</p>
                                <p><strong>City:</strong> {{ $patient->city ?? 'N/A' }}</p>
                                <p><strong>State:</strong> {{ $patient->state ?? 'N/A' }}</p>
                                <p><strong>Postal Code:</strong> {{ $patient->postal_code ?? 'N/A' }}</p>
                            @else
                                <p class="text-muted">No address information available.</p>
                            @endif
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="mb-0">Medical Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Medical History</h6>
                                    <p>{{ $patient->medical_history ?: 'No medical history recorded.' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <h6>Allergies</h6>
                                    <p>{{ $patient->allergies ?: 'No allergies recorded.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Emergency Contact</h4>
                        </div>
                        <div class="card-body">
                            @if($patient->emergency_contact_name || $patient->emergency_contact_phone)
                                <p><strong>Name:</strong> {{ $patient->emergency_contact_name ?? 'N/A' }}</p>
                                <p><strong>Phone:</strong> {{ $patient->emergency_contact_phone ?? 'N/A' }}</p>
                            @else
                                <p class="text-muted">No emergency contact information available.</p>
                            @endif
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h4 class="mb-0">Actions</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit Patient
                                </a>
                                <form action="{{ route('patients.destroy', $patient) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this patient?')">
                                        <i class="fas fa-trash"></i> Delete Patient
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
