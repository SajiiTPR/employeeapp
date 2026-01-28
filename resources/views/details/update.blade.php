@extends('layout.app')
@section('main')
<!-- breadcrumb path -->
            <div class="col">
                <nav class="my-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/details/{{$employee->id}}/details">view details</a></li>
                        <li class="breadcrumb-item active">Update Form</li>
                    </ol>
                </nav>
            </div>
<div class="container my-3">
    <!-- cart -->
    <div class="row">
        <div class="col-md-6 offset-md-3 p-3">
            <div class="card shadow">
                <!-- cart header -->
                <div class="card-header bg-body-tertiary text-center">
                    <a href="/">
                        <i class="bi bi-arrow-left-circle position-absolute start-0 ms-3 mt-2 text-secondary fw-bold text-decoration-underline fs-5">
                            back</i>
                    </a>
                    <p class="fw-bold fs-3 text-shadow text-success text-capitalize bg-body-tertiary">Registration Form</p>
                </div>
                <!-- cart body -->
                <div class="card-body">
                    <form class="row " action="/details/{{$employee->id}}/newupdate" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label for="firstname" class="form-label text-capitalize">first name</label>
                            <input type="text" name="fname" id="fname" 
                            class="form-control text-capitalize{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                            value="{{old('fname', $employee->fname)}}">
                            @error('fname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastname" class="form-label text-capitalize">Last name</label>
                            <input type="text" name="lname" id="lname" 
                            class="form-control text-capitalize{{ $errors->has('lastname') ? ' is-invalid' : '' }}" 
                            id="lname" value="{{old('lname', $employee->lname)}}">
                            @error('lname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-capitalize">Email address</label>
                            <input type="email" name="email" id="email" 
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                            id="email" aria-describedby="emailHelp" value="{{old('email', $employee->mail)}}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Address" class="form-label text-capitalize">Address</label>
                            <textarea id="Address"
                            class="form-control text-capitalize{{ $errors->has('Address') ? ' is-invalid' : '' }}" name="Address"
                            id="Address" rows="3">{{old('Address', $employee->address)}}</textarea>
                            @error('Address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-capitalize">phone</label>
                            <input type="text" name="phone" id="phone" 
                            class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" 
                            id="phone" value="{{old('phone', $employee->phone)}}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col my-3">
                            <button type="submit" name="submit"
                                class="btn btn-primary form-control text-capitalize fw-bold shadow">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection