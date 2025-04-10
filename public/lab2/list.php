<?php
$uploadDir = 'uploads/';

$files = array_diff(scandir($uploadDir), array('.', '..'));

// Напишіть PHP-скрипт, який виводить список всіх файлів, що знаходяться у директорії uploads.
if (count($files) > 0) {
    echo "<h2>Список файлів у директорії uploads:</h2>";
    foreach ($files as $file) {

        // Створіть посилання для завантаження кожного файлу зі списку.
        echo "<a href='$uploadDir$file'>$file</a><br>";
    }
} else {
    echo "В директорії немає файлів.";
}