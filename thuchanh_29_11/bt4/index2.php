<?php
// Kết nối CSDL
$pdo = new PDO("mysql:host=localhost;dbname=bt4;charset=utf8mb4", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function parseQuestions($filePath) {
    $content = file_get_contents($filePath);
    $blocks = preg_split("/\R{2,}/", trim($content)); // tách theo dòng trống
    $questions = [];

    foreach ($blocks as $block) {
        $lines = array_values(array_filter(array_map('trim', explode("\n", $block))));
        $q = ['question' => '', 'choices' => [], 'answer' => null];

        foreach ($lines as $line) {
            if ($q['question'] === '' && !preg_match('/^[ABCD]\./i', $line) && stripos($line, 'ANSWER:') !== 0) {
                $q['question'] = $line;
            } elseif (preg_match('/^A\./i', $line)) {
                $q['choices']['A'] = substr($line, 2);
            } elseif (preg_match('/^B\./i', $line)) {
                $q['choices']['B'] = substr($line, 2);
            } elseif (preg_match('/^C\./i', $line)) {
                $q['choices']['C'] = substr($line, 2);
            } elseif (preg_match('/^D\./i', $line)) {
                $q['choices']['D'] = substr($line, 2);
            } elseif (stripos($line, 'ANSWER:') === 0) {
                $q['answer'] = strtoupper(trim(substr($line, 7)));
            }
        }

        if ($q['question'] && count($q['choices']) === 4 && $q['answer']) {
            $questions[] = $q;
        }
    }
    return $questions;
}

// Upload và lưu
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $fileTmp = $_FILES['file']['tmp_name'];
    $questions = parseQuestions($fileTmp);

    foreach ($questions as $q) {
        $stmt = $pdo->prepare("INSERT INTO quiz_questions (question, choice_a, choice_b, choice_c, choice_d, answer) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $q['question'],
            $q['choices']['A'],
            $q['choices']['B'],
            $q['choices']['C'],
            $q['choices']['D'],
            $q['answer']
        ]);
    }
    echo "<p style='color:green'>Upload và lưu dữ liệu thành công!</p>";
}
?>

<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<title>Bài tập 4 - Upload TXT câu hỏi</title>
<style>
body { font-family: sans-serif; max-width: 1000px; margin: 20px auto; }
table { border-collapse: collapse; width: 100%; margin-top: 20px; }
th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
th { background: #f0f0f0; }
</style>
</head>
<body>
<h1>Bài tập 4 - Upload TXT câu hỏi trắc nghiệm</h1>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept=".txt">
    <button type="submit">Upload</button>
</form>

<h2>Câu hỏi đã lưu</h2>
<table>
<tr>
    <th>ID</th><th>Câu hỏi</th><th>A</th><th>B</th><th>C</th><th>D</th><th>Đáp án</th>
</tr>
<?php
$stmt = $pdo->query("SELECT * FROM quiz_questions");
foreach ($stmt as $row) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['question']}</td>";
    echo "<td>{$row['choice_a']}</td>";
    echo "<td>{$row['choice_b']}</td>";
    echo "<td>{$row['choice_c']}</td>";
    echo "<td>{$row['choice_d']}</td>";
    echo "<td>{$row['answer']}</td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>
