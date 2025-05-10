<?php
session_start();

function generateData() {
    sleep(2);

    return [
        'usd' => rand(35, 40) + (rand(0, 99) / 100),
        'eur' => rand(38, 43) + (rand(0, 99) / 100),
        'gbp' => rand(45, 50) + (rand(0, 99) / 100),
        'updated' => date('Y-m-d H:i:s')
    ];
}

if (isset($_SESSION['cached_data'])) {
    $age = time() - $_SESSION['cached_time'];

    if ($age < 600) {
        $data = $_SESSION['cached_data'];
        $source = 'Отримано з кешу сесії';
    } else {
        $data = generateData();
        $_SESSION['cached_data'] = $data;
        $_SESSION['cached_time'] = time();
        $source = 'Згенеровано нові дані (кеш протух)';
    }
} else {
    $data = generateData();
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();
    $source = 'Згенеровано нові дані (кеш відсутній)';
}

echo "<h1>Курси валют</h1>";
echo "<p>USD: " . $data['usd'] . "</p>";
echo "<p>EUR: " . $data['eur'] . "</p>";
echo "<p>GBP: " . $data['gbp'] . "</p>";
echo "<p>Оновлено: " . $data['updated'] . "</p>";
echo "<p><em>$source</em></p>";
echo "<p><a href='".$_SERVER['PHP_SELF']."'>Оновити</a></p>";
echo "<p><a href='".$_SERVER['PHP_SELF']."?clear_cache=1'>Очистити кеш</a></p>";

if (isset($_GET['clear_cache'])) {
    unset($_SESSION['cached_data']);
    unset($_SESSION['cached_time']);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>