<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Cập nhật Issue</title>
</head>
<body>

<h1 class="m-5">Cập nhật thông tin Issue</h1>

<form action="{{ route('issues.update', $issue->issues_id) }}" method="POST" class="m-5">
    @csrf
    @method('PUT')

    {{-- Người báo cáo --}}
    <div class="mb-3">
        <label class="form-label">Người báo cáo</label>
        <input type="text" name="reported_by" class="form-control"
               value="{{ $issue->reported_by }}" required>
    </div>

    {{-- Máy tính --}}
    <div class="mb-3">
        <label class="form-label">Máy tính</label>
        <select name="computer_id" class="form-control" required>
            @foreach($computers as $computer)
                <option value="{{ $computer->computer_id }}"
                    {{ $computer->computer_id == $issue->computer_id ? 'selected' : '' }}>
                    {{ $computer->computer_name }} - {{ $computer->model }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Mô tả --}}
    <div class="mb-3">
        <label class="form-label">Mô tả sự cố</label>
        <textarea name="description" class="form-control" rows="4" required>{{ $issue->description }}</textarea>
    </div>

    {{-- Trạng thái --}}
    <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="status" class="form-control">
            <option value="Open" {{ $issue->status == 'Open' ? 'selected' : '' }}>Open</option>
            <option value="In_Progress" {{ $issue->status == 'In_Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('issues.index') }}" class="btn btn-secondary">Quay lại</a>
</form>

</body>
</html>
