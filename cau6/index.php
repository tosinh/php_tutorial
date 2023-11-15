<!-- Viết ứng dụng “trắc nghiệm tính cách” -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trắc Nghiệm Tính Cách</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="quiz-container">
        <h2>Trắc Nghiệm Tính Cách</h2>

        <form action="result.php" method="post">
            <label for="q1">1. Bạn thích thú cưng nào sau đây?</label>
            <input type="radio" name="q1" value="cat"> Mèo
            <input type="radio" name="q1" value="dog"> Chó
            <input type="radio" name="q1" value="bird"> Chim

            <label for="q2">2. Bạn thích hoạt động nào sau đây nhất?</label>
            <input type="radio" name="q2" value="reading"> Đọc sách
            <input type="radio" name="q2" value="sports"> Thể thao
            <input type="radio" name="q2" value="music"> Nghe nhạc

            <label for="q3">3. Bạn cảm thấy thoải mái khi ở trong tình huống nào sau đây?</label>
            <input type="radio" name="q3" value="alone"> Một mình
            <input type="radio" name="q3" value="with_friends"> Cùng bạn bè
            <input type="radio" name="q3" value="family"> Gia đình

            <button type="submit">Xem kết quả</button>
        </form>
    </div>

</body>

</html>