<?php

require_once __DIR__ . '/../models/repositories/ClientRepository.php';
require_once __DIR__ . '/../models/Client.php';

class ClientController
{
    private ClientRepository $clientRepository;
    private OrderRepository $orderRepository;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
        $this->orderRepository = new OrderRepository();
    }

    public function home()
    {
        $clients = $this->clientRepository->getClients();

        require_once __DIR__ . '/../views/client-list.php';
    }

    public function show(int $id) 
    {
        $client = $this->clientRepository->getClient($id);
        $orders = $this->orderRepository->getOrdersByClientId($id);

        require_once __DIR__ . '/../views/client-view.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/client-create.php';
    }

    public function store()
    {
        $client = new Client();
        $client->setName($_POST['name']);
        $client->setEmail($_POST['email']);
        $client->setTelephone($_POST['telephone']);
        $this->clientRepository->create($client);

        header('Location: ?');
    }

    public function edit(int $id)
    {
        $client = $this->clientRepository->getClient($id);
        require_once __DIR__ . '/../views/client-edit.php';
    }

    public function update()
    {
        $client = new Client();
        $client->setId($_POST['id']);
        $client->setName($_POST['name']);
        $client->setEmail($_POST['email']);
        $client->setTelephone($_POST['telephone']);
        $this->clientRepository->update($client);

        header('Location: ?');
    }

    public function delete(int $id)
    {
        $this->clientRepository->delete($id);

        header('Location: ?');
    }

    public function forbidden()
    {
        require_once __DIR__ . '/../views/404.php';
        http_response_code(404);
    }
}