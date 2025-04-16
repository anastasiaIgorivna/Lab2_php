<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Сортування користувачів</title>
</head>
<body>
    <h2>Сортування користувачів</h2>

    <form method="post">
        <label for="sort">Сортувати за:</label>
        <select name="sort" id="sort">
            <option value="name">Ім'я (алфавіт)</option>
            <option value="age">Вік (від найменшого)</option>
        </select>
        <button type="submit">Сортувати</button>
    </form>

    <?php
    // Асоціативний масив користувачів
    $users = [
        "Оксана" => 24,
        "Андрій" => 31,
        "Марія" => 19,
        "Ігор" => 27,
        "Світлана" => 35
    ];

    // Функція сортування
    function sort_users(array $users, string $by): array {
        if ($by === "age") {
            // Сортування за віком (значення)
            asort($users);
        } elseif ($by === "name") {
            // Сортування за іменами (ключі)
            ksort($users);
        }
        return $users;
    }

    // Якщо форма була відправлена
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $sortType = $_POST["sort"];
        $users = sort_users($users, $sortType);

        echo "<h3>Відсортований список:</h3>";
        echo "<ul>";
        foreach ($users as $name => $age) {
            echo "<li>$name — $age років</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
