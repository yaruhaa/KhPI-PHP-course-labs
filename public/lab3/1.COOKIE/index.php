<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username'])) {
    setcookie("username", $_POST['username'], time() + (7 * 24 * 60 * 60));
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>
<?php if (isset($_COOKIE['username'])): ?>
    <h2>Привіт, <?= htmlspecialchars($_COOKIE['username']) ?>!</h2>
    <a href="delete.php">Видалити cookie</a>
<?php else: ?>
    <form method="post">
        Ім'я: <input type="text" name="username">
        <input type="submit" value="Надіслати">
    </form>
<?php endif; ?>
</body>
</html>
