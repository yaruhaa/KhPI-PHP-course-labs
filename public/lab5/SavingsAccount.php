<?php

require_once 'BankAccount.php';

//Створіть клас SavingsAccount, який успадковує BankAccount
class SavingsAccount extends BankAccount {

    //Додайте статичну властивість interestRate, яка визначає відсоткову ставку для накопичувального рахунку
    public static float $interestRate = 0.03;

    //Реалізуйте метод applyInterest(), який додає до балансу відсоток від поточного балансу відповідно до відсоткової ставки
    public function applyInterest() {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
    }
}