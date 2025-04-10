<?php
session_start();
$servername = "localhost";
$username = "started-user";
$password = "started-password";
$dbname = "started";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Перевірка, чи існує такий користувач
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $user, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Користувач з таким ім'ям або електронною поштою вже існує!";
    } else {
        // Вставка нового користувача
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user, $email, $password);
        if ($stmt->execute()) {
            echo "Реєстрація успішна!";
        } else {
            echo "Помилка реєстрації: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
