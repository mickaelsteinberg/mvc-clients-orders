<?php

require_once __DIR__ . '/../lib/database.php';

class Client
{
    private int $id;
    private string $name;
    private string $email;
    private string $telephone;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt->format('Y-m-d H:i:s');
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt->format('Y-m-d H:i:s');
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = htmlspecialchars($name);
    }

    public function setEmail(string $email): void
    {
        $this->email = htmlspecialchars($email);
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = htmlspecialchars($telephone);
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}

