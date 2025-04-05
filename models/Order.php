<?php

require_once __DIR__ . '/../lib/database.php';
require_once __DIR__ . '/Client.php';

class Order
{
    private int $id;
    private string $title;
    private string $status;
    private int $clientId;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getClientId(): int
    {
        return $this->clientId;
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

    public function setTitle(string $title): void
    {
        $this->title = htmlspecialchars($title);
    }

    public function setStatus(string $status): void
    {
        $this->status = htmlspecialchars($status);
    }

    public function setClientId(int $clientId): void
    {
        $this->clientId = $clientId;
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

