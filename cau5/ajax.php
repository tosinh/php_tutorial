<?php
// Mô phỏng dữ liệu từ cơ sở dữ liệu
function getCountries() {
    return json_encode([
        ['id' => 1, 'name' => 'Việt Nam'],
        ['id' => 2, 'name' => 'Mỹ'],
        ['id' => 3, 'name' => 'Anh'],
    ]);
}

function getCities($countryId) {
    // Mô phỏng dữ liệu từ cơ sở dữ liệu
    $cities = [];
    if ($countryId == 1) {
        $cities = [
            ['id' => 101, 'name' => 'Hà Nội'],
            ['id' => 102, 'name' => 'Hồ Chí Minh'],
            ['id' => 103, 'name' => 'Đà Nẵng'],
        ];
    } elseif ($countryId == 2) {
        $cities = [
            ['id' => 201, 'name' => 'New York'],
            ['id' => 202, 'name' => 'Los Angeles'],
            ['id' => 203, 'name' => 'Chicago'],
        ];
    } elseif ($countryId == 3) {
        $cities = [
            ['id' => 301, 'name' => 'London'],
            ['id' => 302, 'name' => 'Manchester'],
            ['id' => 303, 'name' => 'Liverpool'],
        ];
    }

    return json_encode($cities);
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getCountries':
            echo getCountries();
            break;
        case 'getCities':
            if (isset($_GET['countryId'])) {
                echo getCities($_GET['countryId']);
            }
            break;
    }
}
