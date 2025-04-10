<?php

// Напишіть PHP-скрипт, який записує дані (текст) у файл (наприклад, у файл log.txt).
if (isset($_POST['logText'])) {
    $logText = $_POST['logText'];
    $logFile = 'log.txt';
    file_put_contents($logFile, $logText . PHP_EOL, FILE_APPEND);
    echo "Текст успішно записано в лог.<br>";
}

// Реалізуйте читання даних із цього файлу та виведення їх на веб-сторінку.
if (file_exists('log.txt')) {
    $logContents = file_get_contents('log.txt');
    echo "<h2>Вміст лог-файлу:</h2>";
    echo nl2br($logContents);
} else {
    echo "Лог-файл не знайдено.";
}