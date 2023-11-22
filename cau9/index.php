<!-- Lấy tỉ giá từ một website bằng biểu thức chính quy -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lấy tỉ giá từ trang web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .exchange-container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .exchange-rate {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .error-message {
            font-size: 18px;
            color: #ff0000;
            margin-top: 10px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="exchange-container">
        <?php
        // Đường dẫn đến trang web mô phỏng tỉ giá
        $url = "https://vn.investing.com/currencies/streaming-forex-rates-majors";

        // Lấy nội dung của trang web
        $html = file_get_contents($url);

        // Biểu thức chính quy để lấy tỉ giá
        $pattern = '/<span class="exchange-rate">(\d+\.\d+)<\/span>/';

        // Tìm kiếm và lấy kết quả
        if (preg_match($pattern, $html, $matches)) {
            $exchangeRate = $matches[1];
            echo "<div class='exchange-rate'>Tỉ giá là: $exchangeRate</div>";
        } else {
            echo "<div class='error-message'>Không thể lấy được tỉ giá từ trang web.</div>";
        }
        ?>
        <button onclick="location.reload()">Lấy lại</button>
    </div>

</body>

</html>