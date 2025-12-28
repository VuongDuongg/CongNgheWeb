<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Create Student</h1>
        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="student_code" class="form-label">Student Code</label>
                <input type="text" class="form-control" id="student_code" name="student_code"
                    value="{{ old('student_code') }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                    value="{{ old('date_of_birth') }}">
            </div>

            <div class="mb-3">
                <label for="class_id" class="form-label">Class</label>
                <select class="form-control" id="class_id" name="class_id" required>
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                            {{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label><br>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Nam"
                        {{ old('gender') == 'Nam' ? 'checked' : '' }}>
                    <label class="form-check-label">Nam</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Nữ"
                        {{ old('gender') == 'Nữ' ? 'checked' : '' }}>
                    <label class="form-check-label">Nữ</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Khác"
                        {{ old('gender') == 'Khác' ? 'checked' : '' }}>
                    <label class="form-check-label">Khác</label>
                </div>
            </div>


            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" required>
                    <option value="Đang học" {{ old('status') == 'Đang học' ? 'selected' : '' }}>
                        Đang học
                    </option>
                    <option value="Nghỉ học" {{ old('status') == 'Nghỉ học' ? 'selected' : '' }}>
                        Nghỉ học
                    </option>
                    <option value="Tốt nghiệp" {{ old('status') == 'Tốt nghiệp' ? 'selected' : '' }}>
                        Tốt nghiệp
                    </option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Create Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
