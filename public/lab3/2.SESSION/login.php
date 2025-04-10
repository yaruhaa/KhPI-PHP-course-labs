<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['2.SESSION'] === 'admin' && $_POST['password'] === 'admin') {
        $_SESSION['user'] = 'admin';
        $_SESSION['last_activity'] = time();
        header('Location: welcome.php');
        exit;
    } else {
        $error = "Неправильні дані";
    }
}
?>

<form method="post">
    Логін: <input type="text" name="login"><br>
    Пароль: <input type="password" name="password"><br>
    <input type="submit" value="Увійти">
    <?= isset($error) ? "<p style='color:red;'>$error</p>" : "" ?>
</form>