<!-- Kiểm tra dữ liệu cho một form bằng “biểu thức chính quy” -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="phone">Nhập số điện thoại:</label>
        <input type="text" id="phone" name="phone" required>

        <p class="message <?php echo isset($error) ? 'error' : ''; ?>"><?php echo isset($message) ? $message : ''; ?></p>
        <button type="submit">Kiểm tra</button>
        <?php
        // Hàm kiểm tra số điện thoại với biểu thức chính quy
        function validatePhoneNumber($phoneNumber)
        {
            // Biểu thức chính quy cho số điện thoại Việt Nam (10 hoặc 11 chữ số)
            $pattern = '/^(0[1-9][0-9]{8,9})$/';

            // Kiểm tra sự khớp đúng
            return preg_match($pattern, $phoneNumber);
        }

        // Xử lý form nếu có dữ liệu được gửi
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy giá trị từ form
            $userPhoneNumber = $_POST["phone"];

            // Kiểm tra số điện thoại
            if (validatePhoneNumber($userPhoneNumber)) {
                echo "Số điện thoại hợp lệ: $userPhoneNumber";
            } else {
                echo "Số điện thoại không hợp lệ.";
            }
        }
        ?>

    </form>

</body>

</html>