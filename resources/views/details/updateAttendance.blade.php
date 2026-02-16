@extends('layout.app')

@section('main')
<div class="container">

    <!-- Page Title -->
    <div class="row mb-4">
        <div class="col">
            <h3 class="fw-bold">Employee Attendance</h3>
            <p class="text-muted">Mark and manage daily employee attendance</p>
        </div>
    </div>

    <!-- Attendance Form -->
    <div class="card shadow-sm mb-3">
        <div class="card-header bg-primary text-white">
            <strong>Mark Attendance</strong>
        </div>

        <div class="card-body">
            <form action="{{ route('attendances.update') }}" method="POST">
                @csrf
                
                <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">

                <div class="row g-3">

                    <!-- Employee -->
                    <div class="col-md-4">
                        <label class="form-label">Employee <span class="text-danger">*</span></label>
                        <select name="employee_id" class="form-select" required>
                            <option value="">-- Select Employee --</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->fname . ' ' . $employee->lname }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Attendance Date -->
                    <div class="col-md-4">
                        <label class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" name="date" value="{{$attendance->date}}" class="form-control" required>
                    </div>

                    <!-- Status -->
                    <div class="col-md-4">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="">-- Select Status --</option>
                            <option value="present" {{ $attendance->status == 'present' ? 'selected' : '' }}>Present</option>
                            <option value="absent" {{ $attendance->status == 'absent' ? 'selected' : '' }}>Absent</option>
                            <option value="late" {{ $attendance->status == 'late' ? 'selected' : '' }}>Late</option>
                            <option value="half_day" {{ $attendance->status == 'half_day' ? 'selected' : '' }}>Half Day</option>
                        </select>
                    </div>

                    <!-- Check In -->
                    <div class="col-md-3">
                        <label class="form-label">Check In Time</label>
                        <input type="time" name="check_in" value="{{$attendance->check_in}}" class="form-control">
                    </div>

                    <!-- Check Out -->
                    <div class="col-md-3">
                        <label class="form-label">Check Out Time</label>
                        <input type="time" name="check_out" value="{{$attendance->check_out}}" class="form-control">
                    </div>

                    <!-- Work Hours -->
                    <div class="col-md-3">
                        <label class="form-label">Work Hours</label>
                        <input type="number" step="0.5" name="work_hours" value="{{$attendance->work_hours}}" class="form-control" placeholder="8.0">
                    </div>

                    <!-- Reason / Remarks -->
                    <div class="col-md-12">
                        <label class="form-label">Remarks / Reason</label>
                        <textarea name="remarks" class="form-control" rows="2" placeholder="Optional notes...">{{$attendance->remarks}}</textarea>
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="mt-4 text-end">
                    <button class="btn btn-success px-4">
                        <i class="bi bi-check-circle"></i> Update Record
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection