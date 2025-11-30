<?php
// Đường dẫn tới file CSV (đặt cùng thư mục với file .php)
$csvFile = __DIR__ . '/65HTTT_Danh_sach_diem_danh.csv';

// Kiểm tra tồn tại
if (!file_exists($csvFile)) {
    die('Không tìm thấy tệp CSV: ' . htmlspecialchars(basename($csvFile)));
}

// Mở file
$handle = fopen($csvFile, 'r');
if (!$handle) {
    die('Không thể mở tệp CSV.');
}
  
// Xử lý BOM UTF-8 (nếu có)
$firstLine = fgets($handle);
if ($firstLine === false) {
    die('Tệp CSV trống.');
}
// Loại BOM nếu có
$firstLine = ltrim($firstLine, "\xEF\xBB\xBF");
// Đưa con trỏ về sau khi đọc dòng đầu tiên đã xử lý
$rows = [];
$header = str_getcsv($firstLine); // lấy tiêu đề từ dòng đầu (đã xử lý BOM)

// Đọc các dòng tiếp theo
while (($data = fgetcsv($handle)) !== false) {
    $rows[] = $data;
}
fclose($handle);
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Danh sách từ CSV</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body { font-family: system-ui, sans-serif; max-width: 1000px; margin: 24px auto; padding: 0 16px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #ddd; padding: 8px 10px; text-align: left; }
    th { background: #f6f6f6; }
    caption { text-align: left; font-weight: 600; margin-bottom: 8px; }
    .muted { color: #666; font-size: 0.9em; margin: 8px 0 16px; }
  </style>
</head>
<body>
  <h1>Hiển thị danh sách từ CSV</h1>
  <p class="muted">Nguồn dữ liệu: <strong><?= htmlspecialchars(basename($csvFile)) ?></strong></p>

  <table>
    <caption>Nội dung tệp CSV</caption>
    <thead>
      <tr>
        <?php foreach ($header as $col): ?>
          <th><?= htmlspecialchars($col) ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($rows)): ?>
        <tr><td colspan="<?= count($header) ?>">Không có dữ liệu.</td></tr>
      <?php else: ?>
        <?php foreach ($rows as $r): ?>
          <tr>
            <?php
              // Nếu số cột không đều, lấp đầy để khớp tiêu đề
              $cols = array_pad($r, count($header), '');
              foreach ($cols as $cell):
            ?>
              <td><?= htmlspecialchars($cell) ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</body>
</html>
