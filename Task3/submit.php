<?php
session_start();

$login = $_POST['login'];
$pass1 = $_POST['password1'];
$pass2 = $_POST['password2'];
$gender = $_POST['gender'] ?? '';
$city = $_POST['city'];
$games = $_POST['games'] ?? [];
$about = $_POST['about'];

// Валідація
$pass_msg = ($pass1 === $pass2) ? 'Паролі співпадають' : 'не співпадає (перший - ' . strlen($pass1) . ' символів, другий - ' . strlen($pass2) . ' символів)';

// Обробка фото
$uploadDir = 'uploads/';
$filename = '';
if (!empty($_FILES['photo']['tmp_name'])) {
    $filename = $uploadDir . basename($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], $filename);
}

// Збереження в сесію (крім фото)
$_SESSION['form_data'] = [
    'login' => $login,
    'gender' => $gender,
    'city' => $city,
    'games' => $games,
    'about' => $about
];

// Вивід
echo "<p><strong>Логін:</strong> $login</p>";
echo "<p><strong>Пароль:</strong> $pass_msg</p>";
echo "<p><strong>Стать:</strong> $gender</p>";
echo "<p><strong>Місто:</strong> $city</p>";
echo "<p><strong>Улюблені ігри:</strong><br> " . implode('<br>', $games) . "</p>";
echo "<p><strong>Про себе:</strong><br> " . nl2br(htmlspecialchars($about)) . "</p>";

if ($filename) {
    echo "<p><strong>Фото:</strong><br><img src='$filename' alt='Фото' width='200'></p>";
}
?>
