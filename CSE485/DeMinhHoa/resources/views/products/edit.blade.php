<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua thong tin san pham</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Chỉnh sửa san pham</h1>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $product->description) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
            </div>

            <div class="mb-3">
                <label for="store_id" class="form-label">Store</label>
                <select class="form-control" id="store_id" name="store_id" required>
                    <option value="">Chọn cua hang</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}"
                            {{ old('store_id', $product->store_id) == $store->id ? 'selected' : '' }}>
                            {{ $store->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Updated</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</body>

</html>
