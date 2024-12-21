<?php

namespace App\DataFixtures\Alice;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CustomProvider
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function hashPassword(string $plainPassword): string
    {
        return $this->passwordHasher->hashPassword(new \App\Entity\User(), $plainPassword);
    }
}

