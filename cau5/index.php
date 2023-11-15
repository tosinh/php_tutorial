<!-- Một select box động bằng ngôn ngữ back-end -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Select Box</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <label for="country">Quốc gia:</label>
    <select id="country" name="country">
        <option value="">Chọn quốc gia</option>
    </select>

    <label for="city">Thành phố:</label>
    <select id="city" name="city">
        <option value="">Chọn thành phố</option>
    </select>

    <script>
        $(document).ready(function() {
            // Load quốc gia khi trang được tải
            loadCountries();

            // Khi quốc gia thay đổi, load lại danh sách thành phố
            $("#country").change(function() {
                var countryId = $(this).val();
                loadCities(countryId);
            });
        });

        function loadCountries() {
            $.ajax({
                url: 'ajax.php',
                type: 'GET',
                data: {
                    action: 'getCountries'
                },
                dataType: 'json',
                success: function(response) {
                    var options = '<option value="">Chọn quốc gia</option>';
                    response.forEach(function(country) {
                        options += '<option value="' + country.id + '">' + country.name + '</option>';
                    });
                    $('#country').html(options);
                }
            });
        }

        function loadCities(countryId) {
            $.ajax({
                url: 'ajax.php',
                type: 'GET',
                data: {
                    action: 'getCities',
                    countryId: countryId
                },
                dataType: 'json',
                success: function(response) {
                    var options = '<option value="">Chọn thành phố</option>';
                    response.forEach(function(city) {
                        options += '<option value="' + city.id + '">' + city.name + '</option>';
                    });
                    $('#city').html(options);
                }
            });
        }
    </script>

</body>

</html>