<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Перевірте, чи були отримані дані коректно (перевірка на пусті значення та тип даних).
    if (empty($first_name) || empty($last_name)) {
        echo "Будь ласка, заповніть всі поля.";
    } else {
        // Виведіть привітання користувачу з використанням його імені та прізвища.
        echo "Привіт, $first_name $last_name!";
    }

} else {
    echo "Будь ласка, використовуйте форму для відправки даних.";
}