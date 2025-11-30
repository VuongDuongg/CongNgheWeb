<?php
// Kết nối CSDL
$pdo = new PDO("mysql:host=localhost;dbname=bt4;charset=utf8mb4", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Xử lý khi upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $fileTmp = $_FILES['file']['tmp_name'];

    if (($handle = fopen($fileTmp, 'r')) !== false) {
        $header = fgetcsv($handle); // dòng tiêu đề

        while (($data = fgetcsv($handle)) !== false) {
            // Giả sử đúng thứ tự cột: username,password,lastname,firstname,city,email,course1
            $stmt = $pdo->prepare("INSERT INTO users (username, password, lastname, firstname, city, email, course1) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $data[0], $data[1], $data[2],
                $data[3], $data[4], $data[5], $data[6]
            ]);
        }
        fclose($handle);
        echo "<p style='color:green'>Upload và lưu dữ liệu thành công!</p>";
    }
}
?>

<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<title>Bài tập 4 - Upload CSV</title>
<style>
body { font-family: sans-serif; max-width: 1000px; margin: 20px auto; }
table { border-collapse: collapse; width: 100%; margin-top: 20px; }
th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
th { background: #f0f0f0; }
</style>
</head>
<body>
<h1>Bài tập 4 - Upload CSV và lưu vào CSDL</h1>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept=".csv">
    <button type="submit">Upload</button>
</form>

<h2>Dữ liệu đã lưu</h2>
<table>
<tr>
    <th>ID</th><th>Username</th><th>Password</th><th>Họ</th><th>Tên</th><th>Thành phố</th><th>Email</th><th>Khóa học</th>
</tr>
<?php
$stmt = $pdo->query("SELECT * FROM users");
foreach ($stmt as $row) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['username']}</td>";
    echo "<td>{$row['password']}</td>";
    echo "<td>{$row['lastname']}</td>";
    echo "<td>{$row['firstname']}</td>";
    echo "<td>{$row['city']}</td>";
    echo "<td>{$row['email']}</td>";
    echo "<td>{$row['course1']}</td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>
