<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Кількість днів між датами</title>
</head>
<body>
    <h2>Обчислення кількості днів між двома датами</h2>

    <?php
    $date1 = "10-02-2015";
    $date2 = "20-02-2015";

    // Перетворюємо строки у формат дати
    $d1 = DateTime::createFromFormat('d-m-Y', $date1);
    $d2 = DateTime::createFromFormat('d-m-Y', $date2);

    // Різниця між датами
    $interval = $d1->diff($d2);

    echo "Дата 1: $date1<br>";
    echo "Дата 2: $date2<br><br>";
    echo "📅 Кількість днів між цими датами: <strong>" . $interval->days . "</strong>";
    ?>
</body>
</html>
