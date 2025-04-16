<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Об'єднання масивів</title>
</head>
<body>
    <h2>🔢 Робота з випадковими масивами</h2>

    <form method="post">
        <button type="submit" name="generate">Згенерувати та обробити масиви</button>
    </form>

    <br>

    <?php
    // Функція для створення випадкового масиву
    function createArray() {
        $length = rand(3, 7);
        $array = [];

        for ($i = 0; $i < $length; $i++) {
            $array[] = rand(10, 20);
        }

        return $array;
    }

    // Функція для об'єднання, очищення від повторів і сортування
    function processArrays($arr1, $arr2) {
        $combined = array_merge($arr1, $arr2);       // з’єднання
        $unique = array_unique($combined);           // видалення дублікатів
        sort($unique);                               // сортування за зростанням
        return $unique;
    }

    // Якщо кнопка натиснута
    if (isset($_POST['generate'])) {
        $array1 = createArray();
        $array2 = createArray();
        $result = processArrays($array1, $array2);

        echo "<h3>Масив 1: [" . implode(", ", $array1) . "]</h3>";
        echo "<h3>Масив 2: [" . implode(", ", $array2) . "]</h3>";
        echo "<h3>Результат: [" . implode(", ", $result) . "]</h3>";
    }
    ?>
</body>
</html>
