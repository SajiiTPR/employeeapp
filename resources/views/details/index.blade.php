@extends('layout.app')
@section('main')
<!-- main content -->
<main class="container my-3">
    <!-- heading  -->
    <div class="row mb-3 ">
        <div class="col d-flex align-items-center justify-content-between">
            <p class="fw-bold fs-4 text-shadow text-success text-capitalize">Details</p>
            <a href="details/create" class="btn btn-primary btn-sm text-capitalize shadow fw-bold fs-5 px-3  "><i
                    class="bi bi-plus-circle-fill"></i> add new</a>
        </div>
    </div>

    <!-- employee details in card format -->
    <section class="d-flex justify-content-around flex-wrap gap-2">
        <!-- card -->
         @foreach($employees as $employee)
         @php
            $index = ($employees->currentPage()-1) * $employees->perPage() + $loop->iteration;
         @endphp
        <div class="card shadow mb-3 " style="width: 18rem;">
            
            <a href="details/{{$employee->id}}/delete"  onclick="return confirm('Are you sure you want to delete it?')" type="button" 
            class="btn position-absolute top-0 end-0 m-2">
                <span class="badge text-bg-danger p-2 shadow" aria-label="Close"><i class="bi bi-trash"></i></span>
            </a>
            <div class="card-body">
                <h5 class="card-title text-primary">{{$index}}. {{$employee->fname}} {{$employee->lname}}</h5>
                <p class="card-text text-capitalize"><i class="bi bi-geo-alt"></i> {{$employee->address}}</p>
                <p class="card-text text-capitalize"><i class="bi bi-telephone"></i> {{$employee->phone}}</p>
                <a href="details/{{$employee->id}}/details" class="btn btn-info text-capitalize fw-bold shadow btn-sm">View details</a>
                <a href="details/{{$employee->id}}/update" class="btn btn-warning text-capitalize fw-bold shadow btn-sm float-end">Update</a>
            </div>
        </div>
        @endforeach
    </section>
    {{$employees->links()}}
</main>
@endsection