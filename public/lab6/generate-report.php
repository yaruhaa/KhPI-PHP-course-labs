<?php
$cache_file = 'cache/report.html';
$cache_time = 600; // 10 хвилин у секундах

// Якщо файл cache/report.html існує і його час зміни менше ніж 10 хвилин тому — повертайте вміст цього файлу одразу, без затримки
if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_time)) {
    readfile($cache_file);
    exit;
}
// Інакше — згенеруйте новий звіт, перезапишіть файл кешу і поверніть результат
ob_start();

// Затримку виконання sleep(3) для симуляції тривалої обробки
sleep(3);

echo "<!DOCTYPE html><html><head><title>Звіт</title></head><body>";
echo "<h1>Фінансовий звіт</h1>";
echo "<table>
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Сума</th>
            <th>Дата</th>
        </tr>";

// Генерацію 1000 рядків таблиці (<table>), наприклад з випадковими даними (імена, суми, дати)
for ($i = 1; $i <= 1000; $i++) {
    $name = "Клієнт " . rand(1, 100);
    $amount = rand(100, 10000) . "." . rand(0, 99);
    $date = date("Y-m-d", time() - rand(0, 30*24*60*60));

    echo "<tr>
            <td>$i</td>
            <td>$name</td>
            <td>$amount</td>
            <td>$date</td>
        </tr>";
}

echo "</table>
</body>
</html>";

$content = ob_get_clean();

// Після першого запуску збережіть HTML-звіт у файл-кеш (наприклад, cache/report.html).
if (!file_exists('cache')) {
    mkdir('cache', 0755, true);
}
file_put_contents($cache_file, $content);

echo $content;
?>