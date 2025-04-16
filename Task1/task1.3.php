<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Ім'я файлу без розширення</title>
</head>
<body>
    <h2>Виділення імені файлу без розширення</h2>

    <?php
    $path = "D:\\WebServers\\home\\testsite\\www\\myfile.txt";

    // basename() витягує останню частину шляху (з назвою файлу)
    $filenameWithExt = basename($path); // myfile.txt

    // pathinfo() повертає масив з частинами файлу
    $fileInfo = pathinfo($filenameWithExt);

    $filenameWithoutExt = $fileInfo['filename']; // myfile

    echo "Повний шлях: $path<br>";
    echo "Ім’я файлу без розширення: <strong>$filenameWithoutExt</strong>";
    ?>
</body>
</html>
