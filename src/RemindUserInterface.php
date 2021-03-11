<?php


namespace App;


use Symfony\Component\Mime\Address;

interface RemindUserInterface
{
    public function getName(): string;
    public function getEmail(): Address;
}