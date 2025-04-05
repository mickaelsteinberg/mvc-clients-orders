<?php

require_once __DIR__ . '/../Client.php';
require_once __DIR__ . '/../../lib/database.php';

class ClientRepository
{
    public DatabaseConnection $connection;

    public function __construct()
    {
        $this->connection = new DatabaseConnection();
    }

    public function getClients(): array
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM clients");
        $statement->execute();

        $clients = [];
        foreach ($statement as $row) {
            $client = new Client();
            $client->setId($row['id']);
            $client->setName($row['name']);
            $client->setEmail($row['email']);
            $client->setTelephone($row['telephone']);
            $client->setCreatedAt(date_create_from_format('Y-m-d H:i:s', $row['created_at']));
            $client->setUpdatedAt(date_create_from_format('Y-m-d H:i:s', $row['updated_at']));

            $clients[] = $client;
        }

        return $clients;
    }

    public function getClient(int $id): ?Client
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM clients WHERE id=:id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch();

        if (!$result) {
            return null;
        }

        $client = new Client();
        $client->setId($result['id']);
        $client->setName($result['name']);
        $client->setEmail($result['email']);
        $client->setTelephone($result['telephone']);
        $client->setCreatedAt(date_create_from_format('Y-m-d H:i:s', $result['created_at']));
        $client->setUpdatedAt(date_create_from_format('Y-m-d H:i:s', $result['updated_at']));

        return $client;
    }

    public function create(Client $client): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('INSERT INTO clients (name, email, telephone) VALUES (:name, :email, :telephone);');

        return $statement->execute([
            'name' => $client->getName(),
            'email' => $client->getEmail(),
            'telephone' => $client->getTelephone()
        ]);
    }

    public function update(Client $client): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('UPDATE clients SET name = :name, email = :email, telephone = :telephone WHERE id = :id');

        return $statement->execute([
            'id' => $client->getId(),
            'name' => $client->getName(),
            'email' => $client->getEmail(),
            'telephone' => $client->getTelephone()
        ]);
    }

    public function delete(int $id): bool
    {
        $statement = $this->connection
                ->getConnection()
                ->prepare('DELETE FROM clients WHERE id = :id');
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }

}