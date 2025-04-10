<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація</title>
</head>
<body>
<h2>Форма авторизації</h2>
<form action="login.php" method="POST">
    <label for="username">Ім'я користувача:</label>
    <input type="text" name="username" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Увійти</button>
</form>
</body>
</html>
