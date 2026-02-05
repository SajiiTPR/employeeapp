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
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Mark Attendance</strong>
        </div>

        <div class="card-body">
            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <!-- Employee -->
                    <div class="col-md-4">
                        <label class="form-label">Employee <span class="text-danger">*</span></label>
                        <select name="employee_id" class="form-select" required>
                            <option value="">-- Select Employee --</option>
                            @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">
                                {{ $employee->fname . ' ' . $employee->lname }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Attendance Date -->
                    <div class="col-md-4">
                        <label class="form-label">Date <span class="text-danger">*</span></label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <!-- Status -->
                    <div class="col-md-4">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="">-- Select Status --</option>
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="late">Late</option>
                            <option value="half_day">Half Day</option>
                        </select>
                    </div>

                    <!-- Check In -->
                    <div class="col-md-3">
                        <label class="form-label">Check In Time</label>
                        <input type="time" name="check_in" class="form-control">
                    </div>

                    <!-- Check Out -->
                    <div class="col-md-3">
                        <label class="form-label">Check Out Time</label>
                        <input type="time" name="check_out" class="form-control">
                    </div>

                    <!-- Work Hours -->
                    <div class="col-md-3">
                        <label class="form-label">Work Hours</label>
                        <input type="number" step="0.5" name="work_hours" class="form-control" placeholder="8.0">
                    </div>

                    <!-- Reason / Remarks -->
                    <div class="col-md-12">
                        <label class="form-label">Remarks / Reason</label>
                        <textarea name="remarks" class="form-control" rows="2" placeholder="Optional notes..."></textarea>
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="mt-4 text-end">
                    <button class="btn btn-success px-4">
                        <i class="bi bi-check-circle"></i> Save Attendance
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- Attendance List -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <strong>Attendance Records</strong>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Hours</th>
                        <th>Remarks</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->employee->fname . ' ' . $attendance->employee->lname }}</td>
                        <td>{{ $attendance->date }}</td>
                        <td>
                            <span class="badge 
                                    @if($attendance->status == 'present') bg-success
                                    @elseif($attendance->status == 'absent') bg-danger
                                    @elseif($attendance->status == 'late') bg-warning
                                    @else bg-info
                                    @endif">
                                {{ ucfirst(str_replace('_',' ',$attendance->status)) }}
                            </span>
                        </td>
                        <td>{{ $attendance->work_hours ?? '-' }}</td>
                        <td>{{ $attendance->remarks ?? '-' }}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">
                            No attendance records found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection