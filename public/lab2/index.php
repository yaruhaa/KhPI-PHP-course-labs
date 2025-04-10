<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб2</title>
</head>
<body>

<h1>Завантаження файлу</h1>
<form action="process.php" method="post" enctype="multipart/form-data">
    <label for="file">Оберіть файл для завантаження:</label>
    <input type="file" name="file" id="file" required>
    <input type="submit" value="Завантажити файл">
</form>

<h1>Запис в лог-файл</h1>
<form action="text.php" method="post">
    <label for="logText">Введіть текст для запису в лог:</label><br>
    <textarea name="logText" id="logText" required></textarea><br><br>
    <input type="submit" value="Записати в лог">
</form>

<h1>Список завантажених файлів</h1>
<a href="list.php">Переглянути список файлів</a>
</body>
</html>
