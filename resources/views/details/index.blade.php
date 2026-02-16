@extends('layout.app')
@section('main')
<main class="container my-4">
    <div class="row mb-4">
        <div class="col-12 d-flex align-items-center justify-content-between">
            <h5 class="text-success fw-bold">Employee Details</h5>
            <a href="details/create" class="btn btn-primary btn-sm shadow"><i class="bi bi-plus-circle-fill"></i> Add New</a>
        </div>
    </div>
    <div class="row g-4">
        @foreach($employees as $employee)
        @php
            $index = ($employees->currentPage()-1) * $employees->perPage() + $loop->iteration;
        @endphp
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow border-0">
                <div class="card-body d-flex flex-column">
                    <div class="position-relative">
                        <a href="details/{{$employee->id}}/delete" type="button" class="btn btn-sm position-absolute top-0 end-0" onclick="return confirm('Are you sure you want to delete it?')" style="background: none; border: none;">
                            <span class="badge bg-danger p-2"><i class="bi bi-trash"></i></span>
                        </a>
                    </div>
                    <h5 class="card-title fs-6 text-primary mb-2">{{ $index }}. {{ $employee->fname }} {{ $employee->lname }}</h5>
                    <p class="card-text text-success mb-2"><i class="bi bi-person-workspace"></i> {{ optional($employee->category)->name ?? 'No Category' }}</p>
                    <p class="card-text text-secondary mb-3"><i class="bi bi-telephone"></i> {{ $employee->phone }}</p>
                    <div class="mt-auto">
                        <a href="details/{{ $employee->id }}/details" class="btn btn-info btn-sm me-2"><i class="bi bi-eye"></i> View Details</a>
                        <a href="details/{{ $employee->id }}/update" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Update</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
            {{ $employees->links('pagination::bootstrap-5') }}
        </div>
    </div>
</main>
@endsection
