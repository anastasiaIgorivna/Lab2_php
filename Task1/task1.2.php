<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Сортування міст</title>
</head>
<body>

<h2>Сортування назв міст за алфавітом</h2>

<form method="post">
    <label for="cities">Введіть назви міст через пробіл:</label><br><br>
    <input type="text" name="cities" id="cities" style="width:300px;">
    <br><br>
    <input type="submit" value="Сортувати">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = trim($_POST["cities"]); // Обрізаємо пробіли на початку і в кінці
    if (!empty($input)) {
        // 1. Розділити рядок у масив
        $cities = explode(" ", $input);

        // 2. Відсортувати
        sort($cities, SORT_STRING | SORT_FLAG_CASE); // Алфавітне сортування

        // 3. Вивести результат
        echo "<h3>Результат сортування:</h3>";
        echo implode(" ", $cities);
    } else {
        echo "<p style='color:red;'>Будь ласка, введіть хоча б одне місто.</p>";
    }
}
?>

</body>
</html>
