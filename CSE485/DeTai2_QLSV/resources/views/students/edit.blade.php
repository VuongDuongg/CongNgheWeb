<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Student</h1>
        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="student_code" class="form-label">Student Code</label>
                <input type="text" class="form-control" id="student_code" name="student_code"
                    value="{{ old('student_code', $student->student_code) }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $student->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $student->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', $student->phone) }}">
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                    value="{{ old('date_of_birth', $student->date_of_birth) }}">
            </div>

            <div class="mb-3">
                <label for="class_id" class="form-label">Class</label>
                <select class="form-control" id="class_id" name="class_id" required>
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}"
                            {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}>
                            {{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label"> Gender </label><br>
                <input type="radio" name="gender" value="Nam"
                    {{ old('gender', $student->gender) == 'Nam' ? 'checked' : '' }}> Nam

                <input type="radio" name="gender" value="Nữ"
                    {{ old('gender', $student->gender) == 'Nữ' ? 'checked' : '' }}> Nữ

                <input type="radio" name="gender" value="Khác"
                    {{ old('gender', $student->gender) == 'Khác' ? 'checked' : '' }}> Khác
            </div>

            <select name="status" class="form-control mb-3">
                <option value="Đang học" {{ old('status', $student->status) == 'Đang học' ? 'selected' : '' }}>Đang học
                </option>
                <option value="Nghỉ học" {{ old('status', $student->status) == 'Nghỉ học' ? 'selected' : '' }}>Nghỉ học
                </option>
                <option value="Tốt nghiệp" {{ old('status', $student->status) == 'Tốt nghiệp' ? 'selected' : '' }}>Tốt
                    nghiệp
                </option>
            </select>

            <button type="submit" class="btn btn-primary">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
