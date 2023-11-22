<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $targetDirectory = __DIR__ . "/uploads/";
    $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Kiểm tra xem tập tin đã tồn tại chưa
    if (file_exists($targetFile)) {
        echo "Xin lỗi, tập tin đã tồn tại.";
        $uploadOk = 0;
    }

    // Kiểm tra kích thước tập tin
    if ($_FILES["file"]["size"] > 500000) {
        echo "Xin lỗi, tập tin quá lớn.";
        $uploadOk = 0;
    }

    // Cho phép chỉ định các loại tệp tin được phép
    $allowedTypes = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Xin lỗi, chỉ cho phép tải lên các tệp tin JPG, JPEG, PNG, GIF.";
        $uploadOk = 0;
    }

    // Kiểm tra nếu $uploadOk = 0
    if ($uploadOk == 0) {
        echo "Xin lỗi, tập tin của bạn không được tải lên.";
    } else {
        // Nếu mọi thứ đều ổn, thử tải lên tập tin
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "Tập tin " . htmlspecialchars(basename($_FILES["file"]["name"])) . " đã được tải lên thành công.";
        } else {
            echo "Đã xảy ra lỗi khi tải tập tin lên. Mã lỗi: " . $_FILES["file"]["error"];
        }
    }
}
