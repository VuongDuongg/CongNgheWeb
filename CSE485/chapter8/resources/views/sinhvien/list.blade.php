@extends('layouts.app')

@section('content')

<h2>Quản lý Sinh Viên</h2>

<form action="{{ route('sinhvien.store') }}" method="POST">
    @csrf

    <div>
        <label>Tên sinh viên:</label>
        <input type="text" name="ten_sinh_vien" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>

    <button type="submit">Thêm sinh viên</button>
</form>

<hr>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên sinh viên</th>
        <th>Email</th>
    </tr>

    @foreach($danhSachSV as $sv)
        <tr>
            <td>{{ $sv->id }}</td>
            <td>{{ $sv->ten_sinh_vien }}</td>
            <td>{{ $sv->email }}</td>
        </tr>
    @endforeach
</table>

@endsection
