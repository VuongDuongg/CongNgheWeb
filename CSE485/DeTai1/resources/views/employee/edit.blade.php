<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Employee</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('employee.update', $employee->id_employee) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name_employee" class="form-label">Name</label>
                <input type="text" class="form-control" id="name_employee" name="name_employee" value="{{ old('name_employee', $employee->name_employee) }}" required>
            </div>
            <div class="mb-3">
                <label for="email_employee" class="form-label">Email</label>
                <input type="email" class="form-control" id="email_employee" name="email_employee" value="{{ old('email_employee', $employee->email_employee) }}" required>
            </div>
            <div class="mb-3">
                <label for="position_employee" class="form-label">Position</label>
                <input type="text" class="form-control" id="position_employee" name="position_employee" value="{{ old('position_employee', $employee->position_employee) }}">
            </div>
            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <select class="form-control" id="department_id" name="department_id" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id_department }}" {{ old('department_id', $employee->department_id) == $department->id_department ? 'selected' : '' }}>{{ $department->name_department }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="phone_employee" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone_employee" name="phone_employee" value="{{ old('phone_employee', $employee->phone_employee) }}">
            </div>
            <div class="mb-3">
                <label for="salary_employee" class="form-label">Salary</label>
                <input type="number" step="0.01" class="form-control" id="salary_employee" name="salary_employee" value="{{ old('salary_employee', $employee->salary_employee) }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('employee.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>