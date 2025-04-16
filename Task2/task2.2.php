<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Генератор імен для тваринок</title>
</head>
<body>
    <h2>Генератор імен 🐾</h2>
    <form method="post">
        <label>Введіть склади або символи через кому:</label><br>
        <input type="text" name="syllables" placeholder="напр.: му,ся,ка,ро,ша"><br><br>

        <label>Оберіть тип тваринки:</label><br>
        <select name="animal">
            <option value="кішки">Кішка</option>
            <option value="собаки">Собака</option>
            <option value="хом’ячка">Хом’ячок</option>
            <option value="папуги">Папуга</option>
            <option value="іншої тваринки">Інше</option>
        </select><br><br>

        <button type="submit">Згенерувати ім’я</button>
    </form>

    <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $syllables = explode(',', $_POST['syllables']);
        $animal = $_POST['animal'];

        // Очищення пробілів
        $syllables = array_map('trim', $syllables);
        shuffle($syllables); // перемішати елементи

        // Функція генерації імені
        function generateName($syllables) {
            $count = rand(2, 3); // ім'я з 2–3 складів
            $name = '';

            for ($i = 0; $i < $count; $i++) {
                $name .= $syllables[array_rand($syllables)];
            }

            return ucfirst($name); // Перша літера велика
        }

        $generatedName = generateName($syllables);

        echo "<h3>Для вашої $animal ідеальне ім’я: <span style='color:green;'>$generatedName</span></h3>";
    }
    ?>
</body>
</html>
