<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Перевірка пароля</title>
</head>
<body>

<form method="post">
    <label for="password">Введіть пароль:</label>
    <input type="text" name="password" id="password" required>
    <button type="submit">Перевірити</button>
</form>

<br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];

    function isStrongPassword($password) {
        return strlen($password) >= 8 &&
               preg_match('/[A-Z]/', $password) &&   // велика літера
               preg_match('/[a-z]/', $password) &&   // мала літера
               preg_match('/[0-9]/', $password) &&   // цифра
               preg_match('/[\W_]/', $password);     // спецсимвол
    }

    if (isStrongPassword($password)) {
        echo "<p style='color:green'><strong>✅ Пароль міцний!</strong></p>";
    } else {
        echo "<p style='color:red'><strong>❌ Пароль слабкий! Має містити:</strong><br>
            – одну велику літеру<br>
            – одну малу літеру<br>
            – одну цифру<br>
            – один спеціальний символ<br>
            – мінімум 8 символів загалом</p>";
    }
}
?>

</body>
</html>


