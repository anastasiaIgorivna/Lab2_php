<?php
include_once('Function/func.php');

$x = $_POST['x'];
$y = $_POST['y'] ?? null;
$op = $_POST['operation'];
$result = '';

switch ($op) {
    case 'x_pow_y':
        $result = x_pow_y($x, $y);
        break;
    case 'fact':
        $result = fact($x);
        break;
    case 'my_tg':
        $result = my_tg($x);
        break;
    case 'sin':
        $result = sin_x($x);
        break;
    case 'cos':
        $result = cos_x($x);
        break;
    case 'tg':
        $result = tg_x($x);
        break;
    default:
        $result = 'Невідома операція';
}

echo "<h2>Результат: $result</h2>";
echo "<a href='index.php'>Назад</a>";
?>


