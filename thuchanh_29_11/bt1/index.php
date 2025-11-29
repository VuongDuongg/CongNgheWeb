<?php
require 'data.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách các loài hoa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .flower-item {
            margin-bottom: 30px;
        }

        .flower-item h2 {
            margin: 0 0 5px;
            font-size: 18px;
        }

        .flower-item p {
            margin: 0 0 10px;
            font-size: 14px;
        }

        .flower-item img {
            max-width: 100%;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1>14 loại hoa tuyệt đẹp thích hợp trồng vào dịp xuân hè</h1>

<?php foreach ($flowers as $index => $flower): ?>
    <div class="flower-item">
        <h2><?= ($index+1) . ". " . $flower['name'] ?></h2>
        <p><?= $flower['description'] ?></p>
        <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>">
    </div>
<?php endforeach; ?>

</body>
</html>
