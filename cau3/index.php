<!-- Viết chương trình lấy chòm sao dựa vào ngày tháng sinh -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zodiac</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Chòm sao của bạn</h2>

    <form action="" method="post">
        <label for="day">Ngày sinh:</label>
        <input type="number" name="day" id="day" min="1" max="31" required>

        <label for="month">Tháng sinh:</label>
        <input type="number" name="month" id="month" min="1" max="12" required>

        <button type="submit">Tính chòm sao</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $day = $_POST["day"];
        $month = $_POST["month"];

        // Kiểm tra ngày và tháng có hợp lệ không
        if (($day >= 1 && $day <= 31) && ($month >= 1 && $month <= 12)) {
            $zodiacSign = getZodiacSign($day, $month);
            echo "<p>Chòm sao của bạn là: $zodiacSign</p>";
        } else {
            echo "<p>Ngày và tháng không hợp lệ. Vui lòng nhập lại.</p>";
        }
    }

    function getZodiacSign($day, $month)
    {
        $signs = array(
            array("start_date" => "03-21", "end_date" => "04-19", "sign" => "Aries"),
            array("start_date" => "04-20", "end_date" => "05-20", "sign" => "Taurus"),
            array("start_date" => "05-21", "end_date" => "06-20", "sign" => "Gemini"),
            array("start_date" => "06-21", "end_date" => "07-22", "sign" => "Cancer"),
            array("start_date" => "07-23", "end_date" => "08-22", "sign" => "Leo"),
            array("start_date" => "08-23", "end_date" => "09-22", "sign" => "Virgo"),
            array("start_date" => "09-23", "end_date" => "10-22", "sign" => "Libra"),
            array("start_date" => "10-23", "end_date" => "11-21", "sign" => "Scorpio"),
            array("start_date" => "11-22", "end_date" => "12-21", "sign" => "Sagittarius"),
            array("start_date" => "12-22", "end_date" => "01-19", "sign" => "Capricorn"),
            array("start_date" => "01-20", "end_date" => "02-18", "sign" => "Aquarius"),
            array("start_date" => "02-19", "end_date" => "03-20", "sign" => "Pisces")
        );

        $date = DateTime::createFromFormat('m-d', "$month-$day");

        foreach ($signs as $sign) {
            $start_date = DateTime::createFromFormat('m-d', $sign["start_date"]);
            $end_date = DateTime::createFromFormat('m-d', $sign["end_date"]);

            if ($date >= $start_date && $date <= $end_date) {
                return $sign["sign"];
            }
        }

        return "Unknown";
    }
    ?>

</body>

</html>