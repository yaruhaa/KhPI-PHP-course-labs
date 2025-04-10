<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    exit;
}
?>

<p>IP Клієнта: <?= $_SERVER['REMOTE_ADDR'] ?></p>
<p>Браузер: <?= $_SERVER['HTTP_USER_AGENT'] ?></p>
<p>Скрипт: <?= $_SERVER['PHP_SELF'] ?></p>
<p>Метод: <?= $_SERVER['REQUEST_METHOD'] ?></p>
<p>Шлях на сервері: <?= $_SERVER['SCRIPT_FILENAME'] ?></p>