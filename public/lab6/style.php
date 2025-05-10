<?php
//Створіть PHP-скрипт, який віддає CSS-файл або зображення.
//Додайте до відповіді заголовки кешування:
    //Cache-Control:   public, max-age=86400
    //Expires:   [дата +1 день]
    //Content-Type:   [відповідний MIME-тип]
header("Cache-Control: public, max-age=86400");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 86400) . " GMT");
header("Content-Type: text/css");

echo "body { background-color: #f0f0f0; font-family: Arial, sans-serif; }";
echo "h1 { color: #336699; }";
echo ".container { width: 80%; margin: 0 auto; }";
?>