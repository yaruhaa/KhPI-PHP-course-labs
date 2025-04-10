<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = 'test_user';
    $_SESSION['last_activity'] = time();
}

if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 300) {
    session_unset();
    session_destroy();
    echo "Сесія завершена через неактивність.";
    exit;
}

$_SESSION['last_activity'] = time();
echo "Користувач активний. Сесія діє.";
