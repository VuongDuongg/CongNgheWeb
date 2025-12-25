<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Thêm Issue</title>
</head>
<body>

<h1 class="m-5">Thêm sự cố mới</h1>

<form action="{{ route('issues.store') }}" method="POST" class="m-5">
    @csrf

    {{-- Người báo cáo --}}
    <div class="mb-3">
        <label class="form-label">Người báo cáo</label>
        <input type="text" name="reported_by" class="form-control" required>
    </div>

{{-- Máy tính --}}
<div class="mb-3">
    <label class="form-label">Máy tính</label>
    <select name="computer_id" class="form-control" required>
        <option value="">-- Chọn máy tính --</option>
        @foreach($computers as $computer)
            <option value="{{ $computer->computer_id }}">
                {{ $computer->computer_name }} - {{ $computer->model }}
            </option>
        @endforeach
    </select>
</div>

    {{-- Mô tả --}}
    <div class="mb-3">
        <label class="form-label">Mô tả sự cố</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>

    {{-- Trạng thái --}}
    <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="status" class="form-control">
            <option value="Open">Open</option>
            <option value="In_Progress">In Progress</option>
            <option value="Resolved">Resolved</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Thêm mới</button>
    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Quay lại</a>
</form>

</body>
</html>
