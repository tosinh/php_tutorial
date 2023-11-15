<!-- Mô phỏng máy ATM -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM Simulator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="atm-container">
        <h2>ATM Simulator</h2>

        <form action="" method="post">
            <label for="accountNumber">Số tài khoản:</label>
            <input type="text" name="accountNumber" id="accountNumber" required>

            <label for="pin">Mã PIN:</label>
            <input type="password" name="pin" id="pin" required>

            <button type="submit">Đăng nhập</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $accountNumber = $_POST["accountNumber"];
            $pin = $_POST["pin"];

            // Kiểm tra tài khoản và mã PIN có hợp lệ không
            if ($accountNumber == "123456" && $pin == "1234") {
                echo "<p>Đăng nhập thành công. Chào mừng quý khách!</p>";
            } else {
                echo "<p style='color: red;'>Đăng nhập không thành công. Vui lòng kiểm tra lại thông tin.</p>";
            }
        }
        ?>
    </div>

</body>

</html>