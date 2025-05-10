<?php

interface AccountInterface {

    //для поповнення рахунку
    public function deposit(float $amount);

    //для зняття коштів з рахунку
    public function withdraw(float $amount);

    //для отримання поточного балансу
    public function getBalance(): float;
}