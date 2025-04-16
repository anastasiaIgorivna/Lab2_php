<?php
session_start();

// Зчитування мови з GET або cookie
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + (180 * 24 * 60 * 60)); // 180 днів
} elseif (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'ukr';
}

// Отримання даних із сесії
$data = $_SESSION['form_data'] ?? [];

function getVal($key) {
    global $data;
    return htmlspecialchars($data[$key] ?? '');
}

function isChecked($key, $value) {
    global $data;
    if (!isset($data[$key])) return '';
    return in_array($value, (array)$data[$key]) ? 'checked' : '';
}

function isSelected($key, $value) {
    global $data;
    return (isset($data[$key]) && $data[$key] === $value) ? 'selected' : '';
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
</head>
<body>
    <div>
        <a href="index.php?lang=ukr"><img src="icons/ukr.png" alt="Українська" width="30"></a>
        <a href="index.php?lang=eng"><img src="icons/eng.png" alt="English" width="30"></a>
    </div>
    <p><strong>Вибрана мова:</strong> <?= ($lang === 'ukr') ? 'Українська' : 'English' ?></p>

    <form action="submit.php" method="post" enctype="multipart/form-data">
        Логін: <input type="email" name="login" value="<?= getVal('login') ?>"><br>
        Пароль: <input type="password" name="password1"><br>
        Пароль (ще раз): <input type="password" name="password2"><br>

        Стать:
        <label><input type="radio" name="gender" value="чоловік" <?= getVal('gender') === 'чоловік' ? 'checked' : '' ?>> чоловік</label>
        <label><input type="radio" name="gender" value="жінка" <?= getVal('gender') === 'жінка' ? 'checked' : '' ?>> жінка</label><br>

        Місто:
        <select name="city">
            <?php
            $cities = ['Житомир', 'Київ', 'Львів', 'Харків'];
            foreach ($cities as $city) {
                echo "<option value='$city' " . isSelected('city', $city) . ">$city</option>";
            }
            ?>
        </select><br>

        Улюблені ігри:<br>
        <label><input type="checkbox" name="games[]" value="футбол" <?= isChecked('games', 'футбол') ?>> футбол</label><br>
        <label><input type="checkbox" name="games[]" value="баскетбол" <?= isChecked('games', 'баскетбол') ?>> баскетбол</label><br>
        <label><input type="checkbox" name="games[]" value="волейбол" <?= isChecked('games', 'волейбол') ?>> волейбол</label><br>
        <label><input type="checkbox" name="games[]" value="шахи" <?= isChecked('games', 'шахи') ?>> шахи</label><br>
        <label><input type="checkbox" name="games[]" value="World of Tanks" <?= isChecked('games', 'World of Tanks') ?>> World of Tanks</label><br>

        Про себе:<br>
        <textarea name="about"><?= getVal('about') ?></textarea><br>

        Фотографія: <input type="file" name="photo"><br><br>

        <button type="submit">Зареєструватися</button>
    </form>
</body>
</html>
