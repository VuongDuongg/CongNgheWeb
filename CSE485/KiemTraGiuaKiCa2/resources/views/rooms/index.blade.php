<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Phong</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Danh sach phong</h1>
        <div class ="justify-content-end d-flex">
            <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Them phong</a>
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
                    <th>So phong</th>
                    <th>Khach hang</th>
                    <th>Kieu phong</th>
                    <th>Gia nua dem</th>
                    <th>Ngay nhan</th>
                    <th>Trang thai</th>
                    <th>Hanh Dong</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rooms as $room)
                    <tr>
                        <td>{{ $room->room_number }}</td>
                        <td>{{ $room->guest->guest_name ?? 'N/A' }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td>{{ $room->price_per_night }}</td>
                        <td>{{ $room->check_in_date }}</td>
                        <td>{{ $room->status }}</td>
                        <td>
                            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                            <!-- Xóa (nếu muốn) -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $room->id }}">
                                Xóa
                            </button>

                            <!-- Modal xác nhận xóa -->
                            <div class="modal fade" id="deleteModal{{ $room->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger">Xác nhận xóa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p>
                                                Bạn có chắc chắn muốn xóa phong
                                                <strong>{{ $room->room_number }}</strong> không?
                                            </p>
                                            <p class="text-danger mb-0">
                                                Hành động này không thể hoàn tác!
                                            </p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Hủy
                                            </button>

                                            <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
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
                        <td colspan="7" class="text-center">Không tìm thấy phong nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($rooms->hasPages())
            <div class="d-flex justify-content-center align-items-center mt-3">

                {{-- Nút Trước --}}
                @if ($rooms->onFirstPage())
                    <span class="btn btn-secondary disabled me-2">Trước</span>
                @else
                    <a href="{{ $rooms->previousPageUrl() }}" class="btn btn-primary me-2">Trước</a>
                @endif

                {{-- Các số trang --}}
                @for ($i = 1; $i <= $rooms->lastPage(); $i++)
                    @if ($i == $rooms->currentPage())
                        <span class="btn btn-success mx-1">{{ $i }}</span>
                    @else
                        <a href="{{ $rooms->url($i) }}" class="btn btn-outline-primary mx-1">{{ $i }}</a>
                    @endif
                @endfor

                {{-- Nút Tiếp --}}
                @if ($rooms->hasMorePages())
                    <a href="{{ $rooms->nextPageUrl() }}" class="btn btn-primary ms-2">Tiếp</a>
                @else
                    <span class="btn btn-secondary disabled ms-2">Tiếp</span>
                @endif

            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
