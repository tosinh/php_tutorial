<!-- Giả lập một máy tính cầm tay đơn giản (calculator) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        form {
            width: 300px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <label for="num1">Số thứ nhất:</label>
        <input type="number" name="num1" required>

        <label for="num2">Số thứ hai:</label>
        <input type="number" name="num2" required>

        <label for="operator">Phép toán:</label>
        <select name="operator" required>
            <option value="+">Cộng</option>
            <option value="-">Trừ</option>
            <option value="*">Nhân</option>
            <option value="/">Chia</option>
        </select>

        <button type="submit">Tính</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị từ form
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operator = $_POST["operator"];

        // Kiểm tra xem đầu vào có phải là số không
        if (is_numeric($num1) && is_numeric($num2)) {
            // Thực hiện phép toán
            switch ($operator) {
                case "+":
                    $result = $num1 + $num2;
                    break;
                case "-":
                    $result = $num1 - $num2;
                    break;
                case "*":
                    $result = $num1 * $num2;
                    break;
                case "/":
                    // Kiểm tra chia cho 0
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Không thể chia cho 0";
                    }
                    break;
                default:
                    $result = "Phép toán không hợp lệ";
            }

            // Hiển thị kết quả
            echo "<p>Kết quả của $num1 $operator $num2 là: $result</p>";
        } else {
            // Nếu đầu vào không phải là số
            echo "<p>Vui lòng nhập số hợp lệ.</p>";
        }
    }
    ?>
</body>

</html>