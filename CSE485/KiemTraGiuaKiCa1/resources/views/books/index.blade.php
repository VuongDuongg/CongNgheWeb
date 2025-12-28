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
        <h1>List books</h1>
        <div class ="justify-content-end d-flex">
            <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
        </div>
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
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Member</th>
                    <th>Publication Year</th>
                    <th>Copies Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->member->fullname ?? 'N/A' }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>{{ $book->copies_available }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                            <!-- Xóa (nếu muốn) -->
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
                        <td colspan="7" class="text-center">Không tìm thấy sách nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($books->hasPages())
            <div class="d-flex justify-content-center align-items-center mt-3">

                {{-- Nút Trước --}}
                @if ($books->onFirstPage())
                    <span class="btn btn-secondary disabled me-2">Trước</span>
                @else
                    <a href="{{ $books->previousPageUrl() }}" class="btn btn-primary me-2">Trước</a>
                @endif

                {{-- Các số trang --}}
                @for ($i = 1; $i <= $books->lastPage(); $i++)
                    @if ($i == $books->currentPage())
                        <span class="btn btn-success mx-1">{{ $i }}</span>
                    @else
                        <a href="{{ $books->url($i) }}" class="btn btn-outline-primary mx-1">{{ $i }}</a>
                    @endif
                @endfor

                {{-- Nút Tiếp --}}
                @if ($books->hasMorePages())
                    <a href="{{ $books->nextPageUrl() }}" class="btn btn-primary ms-2">Tiếp</a>
                @else
                    <span class="btn btn-secondary disabled ms-2">Tiếp</span>
                @endif

            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
