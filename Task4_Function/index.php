<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор функцій</title>
</head>
<body>
    <h2>Калькулятор математичних функцій</h2>
    <form action="calculate.php" method="post">
        <label>Введіть x: <input type="number" step="any" name="x" required></label><br><br>
        <label>Введіть y (для x^y): <input type="number" step="any" name="y"></label><br><br>
        <label>Оберіть операцію:</label><br>
        <select name="operation" required>
            <option value="x_pow_y">x^y</option>
            <option value="fact">x!</option>
            <option value="my_tg">my_tg(x)</option>
            <option value="sin">sin(x)</option>
            <option value="cos">cos(x)</option>
            <option value="tg">tg(x)</option>
        </select><br><br>
        <button type="submit">Обчислити</button>
    </form>
</body>
</html>
