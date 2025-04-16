<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Пошук повторюваних елементів масиву</title>
</head>
<body>
    <h2>Введіть масив чисел (через кому):</h2>
    <form method="post">
        <input type="text" name="numbers" placeholder="Наприклад: 1,2,3,2,4,5,1">
        <button type="submit">Знайти дублікати</button>
    </form>

    <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['numbers'];
        $array = array_map('trim', explode(',', $input)); // розділяємо і прибираємо пробіли

        function findDuplicates($array) {
            $counts = array_count_values($array);
            $duplicates = [];

            foreach ($counts as $item => $count) {
                if ($count > 1) {
                    $duplicates[] = $item;
                }
            }

            if (!empty($duplicates)) {
                echo "<p style='color: green;'>Повторювані елементи: <strong>" . implode(", ", $duplicates) . "</strong></p>";
            } else {
                echo "<p style='color: blue;'>Повторюваних елементів не знайдено.</p>";
            }
        }

        findDuplicates($array);
    }
    ?>
</body>
</html>
