<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Chỉnh sửa Sách</h1>

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $book->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author"
                    value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn"
                    value="{{ old('isbn', $book->isbn) }}">
            </div>

            <div class="mb-3">
                <label for="member_id" class="form-label">Member</label>
                <select class="form-control" id="member_id" name="member_id" required>
                    <option value="">Chọn Thành Viên</option>
                    @foreach ($members as $member)
                        <option value="{{ $member->id }}"
                            {{ old('member_id', $book->member_id) == $member->id ? 'selected' : '' }}>
                            {{ $member->fullname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="publication_year" class="form-label">Publication Year</label>
                <input type="number" class="form-control" id="publication_year" name="publication_year"
                    value="{{ old('publication_year', $book->publication_year) }}">
            </div>

            <div class="mb-3">
                <label for="copies_available" class="form-label">Copies Available</label>
                <input type="number" class="form-control" id="copies_available" name="copies_available"
                    value="{{ old('copies_available', $book->copies_available) }}" min="0">
            </div>

            <button type="submit" class="btn btn-primary">Updated</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
