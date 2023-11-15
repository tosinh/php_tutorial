<!-- Đọc các số (phiên số ra chữ). Ví dụ: 123 thành một trăm hai mươi ba. -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Số thành chữ</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="converter-container">
        <h2>Chuyển số thành chữ</h2>

        <form action="" method="post">
            <label for="number">Nhập số:</label>
            <input type="number" name="number" id="number" required>

            <button type="submit">Chuyển đổi</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = isset($_POST['number']) ? $_POST['number'] : 0;
            $words = numberToWords($number);
            echo "<p>$number bằng chữ: $words</p>";
        }

        function numberToWords($number)
        {
            $words = array(
                '0' => 'không',
                '1' => 'một',
                '2' => 'hai',
                '3' => 'ba',
                '4' => 'bốn',
                '5' => 'năm',
                '6' => 'sáu',
                '7' => 'bảy',
                '8' => 'tám',
                '9' => 'chín',
                '10' => 'mười',
                '20' => 'hai mươi',
                '30' => 'ba mươi',
                '40' => 'bốn mươi',
                '50' => 'năm mươi',
                '60' => 'sáu mươi',
                '70' => 'bảy mươi',
                '80' => 'tám mươi',
                '90' => 'chín mươi'
            );

            if ($number < 0 || $number > 999) {
                return 'Số nằm ngoài phạm vi hỗ trợ';
            }

            if ($number < 10) {
                return $words[$number];
            }
            if ($number < 100) {
                $tens = floor($number / 10) * 10;
                $units = $number % 10;
                return $words[$tens] . (($units > 0 && isset($words[$units])) ? ' ' . $words[$units] : '');
            }

            if ($number < 1000) {
                $hundreds = floor($number / 100);
                $remainder = $number % 100;
                $hundredsWord = $words[$hundreds] . ' trăm';
                $remainderWord = ($remainder > 0) ? ' ' . numberToWords($remainder) : '';

                return $hundredsWord . $remainderWord;
            }

            return 'Số nằm ngoài phạm vi hỗ trợ';
        }
        ?>
    </div>

</body>

</html>