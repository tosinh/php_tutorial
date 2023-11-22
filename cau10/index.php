<!-- Lấy tin tự động từ một trang báo -->
<?php
// Xác định URL của trang báo
$url = "https://vnexpress.net/giai-tri";

// Sử dụng cURL hoặc file_get_contents để lấy HTML của trang
$html = file_get_contents($url);

// Kiểm tra xem lấy HTML thành công hay không
if ($html === false) {
    die('Không thể lấy HTML từ trang web.');
}

// Sử dụng DOMDocument để phân tích cú pháp HTML
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML($html);
libxml_clear_errors();

// Sử dụng DOMXPath để tìm kiếm và trích xuất thông tin từ trang
$xpath = new DOMXPath($dom);

// Duyệt qua các phần tử tin tức và trích xuất thông tin
$articles = $xpath->query('//div[@class="HomeTopCate"]//div[@class="item"]');
if ($articles === false) {
    die('Không thể tìm kiếm các phần tử tin tức.');
}

foreach ($articles as $article) {
    $title = $article->getElementsByTagName('h3')->item(0);
    if ($title === null) {
        die('Không thể tìm kiếm tiêu đề.');
    }

    $content = $article->getElementsByTagName('p')->item(0);
    if ($content === null) {
        die('Không thể tìm kiếm nội dung.');
    }

    // In thông tin hoặc lưu vào cơ sở dữ liệu, tùy thuộc vào yêu cầu của bạn
    echo "Tiêu đề: " . $title->textContent . "<br>";
    echo "Nội dung: " . $content->textContent . "<br><br>";
}
?>