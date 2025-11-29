<?php
require 'data.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị Flowers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        img {
            width: 100px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<h1>Quản trị danh sách hoa</h1>

<table>
    <tr>
        <th>Tên hoa</th>
        <th>Mô tả</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($flowers as $flower): ?>
    <tr>
        <td><?= $flower['name'] ?></td>
        <td><?= $flower['description'] ?></td>
        <td><img src="<?= $flower['image'] ?>" alt=""></td>
        <td>
            <button>Sửa</button>
            <button>Xóa</button>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
