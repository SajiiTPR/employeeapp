@extends('layout.app')
@section('main')

<header class="container my-3">
        <div class="row">

            <div class="col-12">
                <p class="fw-bold fs-4 text-shadow text-success text-capitalize">Employee Details</p>
            </div>

            <!-- breadcrumb path -->
            <div class="col">
                <nav class="my-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">view Details</li>
                    </ol>
                </nav>
            </div>

        </div>
    </header>

    <main class="container my-3">
        <section class="row">
            <!-- employee details first section -->
            <aside class="col-md-3">
                <div class="card shadow p-4 " style="width: 18rem;">
                    <p class=" text-capitalize text-warning">{{$employee->fname}}</p>
                    <p class=" text-capitalize text-warning">{{$employee->lname}}</p>
                    <p class=" text-capitalize text-warning">{{$employee->mail}}</p>
                    <p class=" text-capitalize text-warning">{{$employee->address}}</p>
                    <p class=" text-capitalize text-warning">{{$employee->phone}}</p>
                </div>
            </aside>

            <!-- employee details second section -->
            <aside class="col">
                <section class="row">
                    <div class="col">
                        <p class="fw-bold fs-4 text-shadow text-info text-capitalize text-decoration-underline">Your Details</p>
                    </div>
                </section>
                <section class="row">
                    <div class="col-6">
                        <p class="fw-bold fs-5 text-shadow text-capitalize">First Name :</p>
                        <p class=" text-capitalize">{{$employee->fname}}</p>
                    </div>
                    <div class="col-6">
                        <p class="fw-bold fs-5 text-shadow text-capitalize">Last Name :</p>
                        <p class=" text-capitalize">{{$employee->lname}}</p>
                    </div>
                </section>
                <section class="row">
                    <div class="col-6">
                        <p class="fw-bold fs-5 text-shadow text-capitalize">Email :</p>
                        <p class=" text-capitalize">{{$employee->mail}}</p>
                    </div>
                    <div class="col-6">
                        <p class="fw-bold fs-5 text-shadow text-capitalize">Address :</p>
                        <p class=" text-capitalize">{{$employee->address}}</p>
                    </div>
                </section>

                <section class="row">
                    <div class="col-6">
                        <p class="fw-bold fs-5 text-shadow text-capitalize">Phone :</p>
                        <p class=" text-capitalize">{{$employee->phone}}</p>
                    </div>
                </section>

                <section class="row my-3 ">
                    <div class="col d-flex gap-4 align-items-center">
                        <a href="/details/{{$employee->id}}/update" class="btn btn-primary btn-sm text-capitalize fs-6 w-25 fw-bold shadow">update</a>
                        <a href="/details/{{$employee->id}}/delete" onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-danger btn-sm text-capitalize fs-6 w-25 fw-bold shadow ">delete</a>                        
                    </div>
                    
                </section>
            </aside>

        </section>
    </main>

    @endsection