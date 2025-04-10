<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація</title>
</head>
<body>
<h2>Форма реєстрації</h2>
<form action="registration.php" method="POST">
    <label for="username">Ім'я користувача:</label>
    <input type="text" name="username" required><br><br>

    <label for="email">Електронна пошта:</label>
    <input type="email" name="email" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Зареєструватися</button>
</form>
</body>
</html>
