<?php

require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {

    //Додайте константу MIN_BALANCE, яка визначає мінімальний баланс рахунку (наприклад, 0)
    const MIN_BALANCE = 0;

    //Реалізуйте властивості:
    //поточний баланс рахунку
    protected float $balance;

    //валюта рахунку
    protected string $currency;

    public function __construct(float $initialBalance, string $currency) {
        if ($initialBalance < self::MIN_BALANCE) {
            throw new Exception("Початковий баланс не може бути меншим за " . self::MIN_BALANCE);
        }
        $this->balance = $initialBalance;
        $this->currency = $currency;
    }

    //Реалізуйте методи
    public function deposit(float $amount) {
        if ($amount <= 0) {
            //Використовуйте обробку винятків
            //Якщо сума для зняття або поповнення некоректна (негативна) – викидайте виняток з відповідним повідомленням.
            throw new Exception("Сума поповнення повинна бути додатною");
        }
        $this->balance += $amount;
    }
    public function withdraw(float $amount) {

        //Якщо сума для зняття або поповнення некоректна (негативна) – викидайте виняток з відповідним повідомленням.
        if ($amount <= 0) {
            throw new Exception("Сума зняття повинна бути додатною");
        }

        //Якщо сума для зняття більше, ніж баланс рахунку – викидайте виняток Exception з повідомленням "Недостатньо коштів".
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів");
        }

        $this->balance -= $amount;
    }
    public function getBalance(): float {
        return $this->balance;
    }

    public function getCurrency(): string {
        return $this->currency;
    }
}