<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Заміна символів</title>
</head>
<body>
    <h2>Заміна символів у тексті</h2>
    <form method="post">
        <label>Текст: <input type="text" name="text"></label><br><br>
        <label>Знайти: <input type="text" name="search"></label><br><br>
        <label>Замінити на: <input type="text" name="replace"></label><br><br>
        <input type="submit" value="Замінити">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST['text'];
        $search = $_POST['search'];
        $replace = $_POST['replace'];

        $result = str_replace($search, $replace, $text);
        echo "<h3>Результат:</h3>";
        echo "<p>$result</p>";
    }
    ?>
</body>
</html>
