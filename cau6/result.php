<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Tính Cách</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="result-container">
        <h2>Kết Quả Tính Cách</h2>

        <?php
        $q1 = isset($_POST['q1']) ? $_POST['q1'] : '';
        $q2 = isset($_POST['q2']) ? $_POST['q2'] : '';
        $q3 = isset($_POST['q3']) ? $_POST['q3'] : '';

        // Điều chỉnh logic tùy thuộc vào câu hỏi và câu trả lời
        $result = '';

        if ($q1 == 'cat' && $q2 == 'reading' && $q3 == 'alone') {
            $result = 'Bạn có tính cách của người yêu thích sự tĩnh lặng và thư giãn.';
        } elseif ($q1 == 'dog' && $q2 == 'sports' && $q3 == 'with_friends') {
            $result = 'Bạn có tính cách hướng ngoại, năng động và thích thú với các hoạt động nhóm.';
        } elseif ($q1 == 'bird' && $q2 == 'music' && $q3 == 'family') {
            $result = 'Bạn có tính cách âm nhạc, tận hưởng gia đình và thích sự ấm áp.';
        } else {
            $result = 'Kết quả tính cách không thể xác định.';
        }

        echo "<p>$result</p>";
        ?>

        <p><a href="index.php">Quay lại trang chính</a></p>
    </div>

</body>

</html>