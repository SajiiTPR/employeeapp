@extends('layout.app')
@section('main')
<div class="container my-4">
    <!-- breadcrumb path -->
    <nav class="my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active fw-bold">Insert Details</li>
        </ol>
    </nav>

    <!-- registration form -->
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0">
                <!-- card header -->
                <div class="card-header bg-gradient text-dark text-center py-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <a href="/" class="text-dark position-absolute start-0 ms-3 mt-2" style="text-decoration: none;">
                        <i class="bi bi-arrow-left-circle fs-4"></i>
                    </a>
                    
                    <h3 class="fw-bold mb-0"><i class="bi bi-person-plus-fill"></i> Employee Registration</h3>
                    
                </div>

                <!-- card body -->
                <div class="card-body p-4">
                    <form class="row g-3" action="/details/insert" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- personal information section -->
                        <div class="col-12">
                            <h5 class="text-info mb-3"><i class="bi bi-person-circle me-2"></i>Personal Information</h5>
                        </div>

                        <!-- first name -->
                        <div class="col-md-6">
                            <label for="fname" class="form-label fw-semibold">
                                <i class="bi bi-person me-1"></i>First Name
                            </label>
                            <input type="text" name="fname" id="fname" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" placeholder="Enter first name" required>
                            @error('fname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- last name -->
                        <div class="col-md-6">
                            <label for="lname" class="form-label fw-semibold">
                                <i class="bi bi-person me-1"></i>Last Name
                            </label>
                            <input type="text" name="lname" id="lname" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" placeholder="Enter last name" required>
                            @error('lname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- contact information section -->
                        <div class="col-12 mt-4">
                            <h5 class="text-info mb-3"><i class="bi bi-envelope-at me-2"></i>Contact Information</h5>
                        </div>

                        <!-- email address -->
                        <div class="col-12">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope me-1"></i>Email Address
                            </label>
                            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter email address" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- address -->
                        <div class="col-12">
                            <label for="Address" class="form-label fw-semibold">
                                <i class="bi bi-geo-alt me-1"></i>Address
                            </label>
                            <textarea name="Address" id="Address" class="form-control{{ $errors->has('Address') ? ' is-invalid' : '' }}" rows="3" placeholder="Enter full address" required></textarea>
                            @error('Address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- phone number -->
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">
                                <i class="bi bi-telephone me-1"></i>Phone Number
                            </label>
                            <input type="tel" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Enter phone number" required>
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- category select options -->
                        <div class="col-md-6">
                            <label for="category_id" class="form-label fw-semibold">
                                <i class="bi bi-tags me-1"></i>Category
                            </label>
                            <select name="category_id" id="category_id" class="form-select{{ $errors->has('category_id') ? ' is-invalid' : '' }}" required>
                                <option value="">-- Select a category --</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- submit button -->
                        <div class="col-12 mt-4">
                            <button type="submit" name="submit" class="btn btn-primary w-100 py-3 fw-bold shadow-sm">
                                <i class="bi bi-check-circle me-2"></i>Register Employee
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
