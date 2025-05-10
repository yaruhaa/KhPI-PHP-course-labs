<?php

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

function printAccountInfo($account) {
    echo "Баланс: " . $account->getBalance() . " " . $account->getCurrency() . PHP_EOL;
}

echo "--- Тестування банківських рахунків ---" . PHP_EOL;

try {
    $account1 = new BankAccount(100, "USD");
    $account1->deposit(50);
    $account1->withdraw(30);
    printAccountInfo($account1);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL;

try {
    $savings = new SavingsAccount(200, "EUR");
    $savings->deposit(100);
    $savings->applyInterest();
    printAccountInfo($savings);
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . PHP_EOL;
}

echo PHP_EOL;

// Спроба створити рахунок із негативним початковим балансом
try {
    $account2 = new BankAccount(-10, "UAH");
} catch (Exception $e) {
    echo "Помилка при створенні рахунку: " . $e->getMessage() . PHP_EOL;
}

// Спроба зняти більше, ніж є на рахунку
try {
    $account3 = new BankAccount(50, "USD");
    $account3->withdraw(100);
} catch (Exception $e) {
    echo "Помилка при знятті коштів: " . $e->getMessage() . PHP_EOL;
}

// Спроба негативного поповнення
try {
    $account3->deposit(-20);
} catch (Exception $e) {
    echo "Помилка при поповненні: " . $e->getMessage() . PHP_EOL;
}