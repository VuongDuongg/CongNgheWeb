<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Chi Tiết Sinh Viên</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $student->name }}</h5>
                <p class="card-text"><strong>ID:</strong> {{ $student->id }}</p>
                <p class="card-text"><strong>Mã Sinh Viên:</strong> {{ $student->student_code }}</p>
                <p class="card-text"><strong>Tên:</strong> {{ $student->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $student->email }}</p>
                <p class="card-text"><strong>Số Điện Thoại:</strong> {{ $student->phone }}</p>
                <p class="card-text"><strong>Ngày Sinh:</strong> {{ $student->date_of_birth ? \Carbon\Carbon::parse($student->date_of_birth)->format('d/m/Y') : 'N/A' }}</p>
                <p class="card-text"><strong>Lớp:</strong> {{ $student->classs->class_name ?? 'N/A' }}</p>
                <p class="card-text"><strong>Giới Tính:</strong> {{ $student->gender == 'male' ? 'Nam' : 'Nữ' }}</p>
                <p class="card-text"><strong>Trạng Thái:</strong> {{ $student->status == 'active' ? 'Hoạt Động' : 'Không Hoạt Động' }}</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay Lại Danh Sách</a>
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Chỉnh Sửa</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>