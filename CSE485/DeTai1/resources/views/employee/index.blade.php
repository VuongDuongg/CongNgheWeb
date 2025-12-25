<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Employees</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('employee.create') }}" class="btn btn-primary">
                 Add Employee
            </a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Phone</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id_employee }}</td>
                        <td>{{ $employee->name_employee }}</td>
                        <td>{{ $employee->email_employee }}</td>
                        <td>{{ $employee->position_employee }}</td>
                        <td>{{ $employee->department->name_department ?? 'N/A' }}</td>
                        <td>{{ $employee->phone_employee }}</td>
                        <td>{{ $employee->salary_employee }}</td>
                        <td>
                            {{-- <a href="{{ route('employee.show', $employee->id_employee) }}" class="btn btn-info btn-sm">View</a> --}}
                            <a href="{{ route('employee.edit', $employee->id_employee) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('employee.destroy', $employee->id_employee) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
<!-- Add pagination links -->
        <div class="mt-3 text-center">
            <p>Page {{ $employees->currentPage() }} / {{ $employees->lastPage() }}</p>
            {{ $employees->links('pagination::simple-bootstrap-5') }}
        </div>
    </div>
</body>
</html>