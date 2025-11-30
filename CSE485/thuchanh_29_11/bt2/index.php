<?php
// Đọc toàn bộ nội dung file
$lines = file('Quiz.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$questions = [];
$current = [];

foreach ($lines as $line) {
    $line = trim($line);
    if ($line === '') continue;

    // Nếu dòng bắt đầu bằng "ANSWER:" thì lưu đáp án
    if (stripos($line, 'ANSWER:') === 0) {
        $current['answer'] = substr($line, 7);
        $questions[] = $current;
        $current = [];
    }
    // Nếu dòng bắt đầu bằng A/B/C/D thì thêm lựa chọn
    elseif (preg_match('/^[ABCD]\./', $line)) {
        $current['choices'][] = $line;
    }
    // Nếu chưa có câu hỏi thì dòng đầu tiên chính là câu hỏi
    elseif (!isset($current['question'])) {
        $current['question'] = $line;
        $current['choices'] = [];
    }
}
?>
<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<title>Bài thi trắc nghiệm</title>
</head>
<body>
<h1>Bài thi trắc nghiệm</h1>

<?php foreach ($questions as $i => $q): ?>
  <div style="margin-bottom:20px; border:1px solid #ccc; padding:10px;">
    <strong>Câu <?= $i+1 ?>:</strong> <?= htmlspecialchars($q['question']) ?><br>
    <?php foreach ($q['choices'] as $choice): ?>
      <?= htmlspecialchars($choice) ?><br>
    <?php endforeach; ?>
    <div style="color:green; font-weight:bold;">
      Đáp án đúng: <?= htmlspecialchars($q['answer']) ?>
    </div>
  </div>
<?php endforeach; ?>

</body>
</html>
