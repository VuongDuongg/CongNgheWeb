<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>List product</h1>
        <div class ="justify-content-end d-flex">
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Them san pham</a>
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
                    <th>Ten san pham</th>
                    <th>Mo ta</th>
                    <th>Gia</th>
                    <th>Ten cua hang</th>
                    <th>Ngay tao</th>
                    <th>Hanh dong</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->store->name }}</td>
                        <td>{{ $product->created_at-> toDateString() }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                            <!-- Xóa (nếu muốn) -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $product->id }}">
                                Xóa
                            </button>

                            <!-- Modal xác nhận xóa -->
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title text-danger">Xác nhận xóa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p>
                                                Bạn có chắc chắn muốn xóa sản phẩm
                                                <strong>{{ $product->name }}</strong> không?
                                            </p>
                                            <p class="text-danger mb-0">
                                                Hành động này không thể hoàn tác!
                                            </p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Hủy
                                            </button>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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
                        <td colspan="7" class="text-center">Không tìm thấy san pham nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        @if ($products->hasPages())
            <div class="d-flex justify-content-center align-items-center mt-3">

                {{-- Nút Trước --}}
                @if ($products->onFirstPage())
                    <span class="btn btn-secondary disabled me-2">Trước</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="btn btn-primary me-2">Trước</a>
                @endif

                {{-- Các số trang --}}
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    @if ($i == $products->currentPage())
                        <span class="btn btn-success mx-1">{{ $i }}</span>
                    @else
                        <a href="{{ $products->url($i) }}" class="btn btn-outline-primary mx-1">{{ $i }}</a>
                    @endif
                @endfor

                {{-- Nút Tiếp --}}
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="btn btn-primary ms-2">Tiếp</a>
                @else
                    <span class="btn btn-secondary disabled ms-2">Tiếp</span>
                @endif

            </div>
        @endif

    </div>

</body>

</html>
