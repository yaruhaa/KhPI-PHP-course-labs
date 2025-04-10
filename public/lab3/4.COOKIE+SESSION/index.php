<?php
session_start();

if (!isset($_SESSION['4.1.COOKIE+2.SESSION'])) {
    $_SESSION['4.1.COOKIE+2.SESSION'] = [];
}

if (!isset($_COOKIE['old_cart'])) {
    setcookie('old_cart', json_encode([]), time() + (30 * 24 * 60 * 60));
}

if (isset($_POST['product'])) {
    $_SESSION['4.1.COOKIE+2.SESSION'][] = $_POST['product'];

    $old = isset($_COOKIE['old_cart']) ? json_decode($_COOKIE['old_cart'], true) : [];
    $old[] = $_POST['product'];
    setcookie('old_cart', json_encode($old), time() + (30 * 24 * 60 * 60));
    header("Location: index.php");
    exit;
}

$cart = $_SESSION['4.1.COOKIE+2.SESSION'];
$old_cart = isset($_COOKIE['old_cart']) ? json_decode($_COOKIE['old_cart'], true) : [];
?>

<form method="post">
    <input type="text" name="product" placeholder="Назва товару">
    <input type="submit" value="Додати">
</form>

<h3>Поточна корзина:</h3>
<ul>
    <?php foreach ($cart as $item): ?>
        <li><?= htmlspecialchars($item) ?></li>
    <?php endforeach; ?>
</ul>

<h3>Попередні покупки (з cookie):</h3>
<ul>
    <?php foreach ($old_cart as $item): ?>
        <li><?= htmlspecialchars($item) ?></li>
    <?php endforeach; ?>
</ul>

<a href="clear.php">Очистити корзину</a>
