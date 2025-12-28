<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Danh Sách Sinh Viên</h1>
        <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Thêm Sinh Viên Mới</a>
        @if (session('success'))
            <div class="alert alert-success" id="alert-success">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(() => {
                    document.getElementById('alert-success').style.display = 'none';
                }, 3000);
            </script>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã Sinh Viên</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Lớp</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->student_code }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->classs->class_name ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $book->id }}">
                                Xóa
                            </button>

                            <!-- Modal xác nhận xóa -->
                            <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger">Xác nhận xóa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p>
                                                Bạn có chắc chắn muốn xóa sách
                                                <strong>{{ $book->title }}</strong> không?
                                            </p>
                                            <p class="text-danger mb-0">
                                                Hành động này không thể hoàn tác!
                                            </p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Hủy
                                            </button>

                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Xác nhận xóa
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Không tìm thấy sinh viên nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @if ($students->hasPages())
            <div class="d-flex justify-content-center align-items-center mt-3">

                {{-- Nút Trước --}}
                @if ($students->onFirstPage())
                    <span class="btn btn-secondary disabled me-2">Trước</span>
                @else
                    <a href="{{ $students->previousPageUrl() }}" class="btn btn-primary me-2">Trước</a>
                @endif

                {{-- Các số trang --}}
                @for ($i = 1; $i <= $students->lastPage(); $i++)
                    @if ($i == $students->currentPage())
                        <span class="btn btn-success mx-1">{{ $i }}</span>
                    @else
                        <a href="{{ $students->url($i) }}" class="btn btn-outline-primary mx-1">
                            {{ $i }}
                        </a>
                    @endif
                @endfor

                {{-- Nút Tiếp --}}
                @if ($students->hasMorePages())
                    <a href="{{ $students->nextPageUrl() }}" class="btn btn-primary ms-2">Tiếp</a>
                @else
                    <span class="btn btn-secondary disabled ms-2">Tiếp</span>
                @endif

            </div>
        @endif

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
