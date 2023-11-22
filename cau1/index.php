<!-- Tạo phân trang đơn giản? -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân Trang Đơn Giản</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        p {
            margin: 8px 0;
            padding: 8px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            text-decoration: none;
            color: #333;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <h1>Danh Sách Dữ Liệu</h1>

    <?php
    // Giả định dữ liệu
    $totalItems = 50;
    $itemsPerPage = 10;
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Lấy trang hiện tại từ biến GET, nếu không có thì mặc định là trang 1
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Xác định mục bắt đầu và kết thúc cho trang hiện tại
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    $endIndex = min($startIndex + $itemsPerPage - 1, $totalItems - 1);

    // Giả định dữ liệu mục
    $data = range(1, $totalItems);

    // Hiển thị các mục trên trang hiện tại
    for ($i = $startIndex; $i <= $endIndex; $i++) {
        echo "<p>Mục $data[$i]</p>";
    }

    // Tạo liên kết phân trang
    for ($page = 1; $page <= $totalPages; $page++) {
        echo "<a href='?page=$page'>$page</a> ";
    }
    ?>

</body>

</html>