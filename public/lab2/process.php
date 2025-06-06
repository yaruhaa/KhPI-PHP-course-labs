<?php

// Напишіть PHP-скрипт, який обробляє завантаження файлу за допомогою масиву $_FILES.
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Перевірте, чи файл успішно завантажений, використовуючи функцію is_uploaded_file().
    if (is_uploaded_file($file['tmp_name'])) {
        $uploadDir = 'uploads/';
        $fileName = basename($file['name']);
        $uploadPath = $uploadDir . $fileName;

        // Реалізуйте перевірку, чи існує файл з таким же ім'ям у папці uploads.
        if (file_exists($uploadPath)) {

            // Якщо файл вже існує, повідомте про це користувача та запропонуйте йому змінити назву файлу або автоматично додайте унікальний суфікс до імені файлу (наприклад, дату або випадковий номер).
            $fileName = time() . '_' . $fileName;
            $uploadPath = $uploadDir . $fileName;
        }

        // Перевірка типу файлу
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        if (!in_array($file['type'], $allowedTypes)) {
            echo "Тільки зображення (png, jpg, jpeg) дозволені!";
            exit;
        }

        // Перевірте тип файлу (розширення) та його розмір. Дозвольте завантаження лише зображень (png, jpg, jpeg) з розміром не більше 2 МБ.
        if ($file['size'] > 2 * 1024 * 1024) {
            echo "Файл занадто великий! Максимальний розмір — 2 МБ.";
            exit;
        }

        // Використайте функцію move_uploaded_file(), щоб зберегти файл у директорії на сервері (наприклад, у папці uploads).
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            echo "Файл успішно завантажено!<br>";

            //Після успішного завантаження файлу, виведіть на екран інформацію про файл: ім'я файлу, його тип, розмір (у кілобайтах).
            echo "Ім'я файлу: $fileName<br>";
            echo "Тип файлу: " . $file['type'] . "<br>";
            echo "Розмір файлу: " . round($file['size'] / 1024, 2) . " КБ<br>";

            // Створіть посилання для завантаження файлу, яке дозволить користувачу завантажити його назад.
            echo "<a href='$uploadPath'>Завантажити файл</a>";
        } else {
            echo "Помилка при завантаженні файлу.";
        }
    } else {
        echo "Файл не було завантажено.";
    }
} else {
    echo "Немає файлу для завантаження.";
}