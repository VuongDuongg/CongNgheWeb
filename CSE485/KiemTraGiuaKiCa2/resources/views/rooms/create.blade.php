<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm phong moi</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Thêm phong</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('rooms.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="room_number" class="form-label">So phong</label>
                <input type="text" class="form-control" id="room_number" name="room_number"
                    value="{{ old('room_number') }}" required>
            </div>

            <div class="mb-3">
                <label for="guest_id" class="form-label">Ten khach hang</label>
                <select class="form-control" id="guest_id" name="guest_id" required>
                    <option value="">Chọn Khach Hang</option>
                    @foreach ($guests as $guest)
                        <option value="{{ $guest->id }}" {{ old('guest_id') == $guest->id ? 'selected' : '' }}>
                            {{ $guest->guest_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="room_type" class="form-label">Kieu phong</label>
                <select class="form-control" id="room_type" name="room_type" required>
                    <option value="">Chon kieu phong</option>
                    <option value="Single" {{ old('room_type') == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value="Double" {{ old('room_type') == 'Double' ? 'selected' : '' }}>Double</option>
                    <option value="Suite" {{ old('room_type') == 'Suite' ? 'selected' : '' }}>Suite</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="price_per_night" class="form-label">Gia nua dem</label>
                <input type="nunmber" class="form-control" id="price_per_night" name="price_per_night"
                    value="{{ old('price_per_night') }}">
            </div>



            <div class="mb-3">
                <label for="check_in_date" class="form-label">Ngay nhan phong</label>
                <input type="date" class="form-control" id="check_in_date" name="check_in_date"
                    value="{{ old('check_in_date') }}">
            </div>

            <div class="mb-3">
                <label for="check_out_date" class="form-label">Ngay tra phong</label>
                <input type="date" class="form-control" id="check_out_date" name="check_out_date"
                    value="{{ old('check_out_date', 0) }}" min="0">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Trang thai</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">Chon trang thai</option>
                    <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Occupied" {{ old('status') == 'Occupied' ? 'selected' : '' }}>Occupied</option>
                    <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance
                    </option>
                </select>

            </div>
            <button type="submit" class="btn btn-primary">Add room</button>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</body>

</html>
