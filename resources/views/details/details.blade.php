@extends('layout.app')
@section('main')

<header class="container my-4">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1 class="fw-bold fs-3 text-success text-capitalize mb-0">Employee Details</h1>
        </div>
        <div class="col-md-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active fw-bold" aria-current="page">View Details</li>
                </ol>
            </nav>
        </div>
    </div>
</header>

<main class="container my-4">
    <div class="row g-4">
        <!-- Employee Summary Card -->
        <aside class="col-12 col-md-4 col-lg-3">
            <div class="card shadow h-100 border-0 bg-light">
                <div class="card-body text-center">
                    <div class="mb-1">
                        <i class="bi bi-person-circle fs-1 text-primary"></i>
                    </div>
                    <p class="card-title text-capitalize fw-bold text-warning mb-2 text-dark">
                        {{$employee->fname}} {{$employee->lname}}
                    </p>
                    <p class="card-text text-capitalize text-success fw-semibold mb-2">
                        <i class="bi bi-tag-fill me-1"></i>{{optional($employee->category)->name ?? 'No Category'}}
                    </p>
                    <p class="card-text mb-2">
                        <a href="mailto:{{$employee->mail}}" class="text-decoration-none text-primary ">
                            <i class="bi bi-envelope-fill me-1"></i>{{$employee->mail}}
                        </a>
                    </p>
                    <p class="card-text text-capitalize text-warning">
                        <i class="bi bi-telephone-fill me-1"></i>{{$employee->phone}}
                    </p>
                </div>
            </div>
        </aside>

        <!-- Detailed Information Section -->
        <section class="col-12 col-md-8 col-lg-9">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0 fs-5">
                        <i class="bi bi-info-circle-fill me-2"></i>Detailed Information
                    </h4>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4 fw-semibold text-muted">First Name</dt>
                        <dd class="col-sm-8 text-capitalize">{{$employee->fname}}</dd>

                        <dt class="col-sm-4 fw-semibold text-muted">Last Name</dt>
                        <dd class="col-sm-8 text-capitalize">{{$employee->lname}}</dd>

                        <dt class="col-sm-4 fw-semibold text-muted">Email</dt>
                        <dd class="col-sm-8">
                            <a href="mailto:{{$employee->mail}}" class="text-decoration-none">{{$employee->mail}}</a>
                        </dd>

                        <dt class="col-sm-4 fw-semibold text-muted">Address</dt>
                        <dd class="col-sm-8 text-capitalize">{{$employee->address}}</dd>

                        <dt class="col-sm-4 fw-semibold text-muted">Phone</dt>
                        <dd class="col-sm-8 text-capitalize">{{$employee->phone}}</dd>

                        <dt class="col-sm-4 fw-semibold text-muted">Category</dt>
                        <dd class="col-sm-8">
                            <span class="badge bg-success text-capitalize fw-bold">
                                {{optional($employee->category)->name ?? 'No Category'}}
                            </span>
                        </dd>

                        <dt class="col-sm-4 fw-semibold text-muted">Description</dt>
                        <dd class="col-sm-8 text-capitalize">{{optional($employee->category)->description ?? 'No Description'}}</dd>
                    </dl>

                    <hr class="my-4">

                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-start">
                        <a href="/details/{{$employee->id}}/update" class="btn btn-primary fw-bold text-uppercase">
                            <i class="bi bi-pencil-square me-2"></i>Edit Employee
                        </a>
                        <a href="/details/{{$employee->id}}/delete"
                           onclick="return confirm('Are you sure! you want to delete this employee?')"
                           class="btn btn-danger fw-bold text-uppercase">
                            <i class="bi bi-trash-fill me-2"></i>Delete Employee
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

@endsection
