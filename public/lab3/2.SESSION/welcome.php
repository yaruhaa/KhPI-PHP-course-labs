<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: 2.SESSION.php');
    exit;
}
echo "<h2>Вітаємо, {$_SESSION['user']}!</h2>";
echo '<a href="logout.php">Вийти</a>';