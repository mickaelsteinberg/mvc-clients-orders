<?php

require_once __DIR__ . '/../models/repositories/OrderRepository.php';
require_once __DIR__ . '/../models/Order.php';

class OrderController
{
    private OrderRepository $orderRepository;
    private ClientRepository $clientRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->clientRepository = new ClientRepository();
    }

    public function home()
    {
        $orders = $this->orderRepository->getOrders();

        require_once __DIR__ . '/../views/order-list.php';
    }

    public function show(int $id) 
    {
        $order = $this->orderRepository->getOrder($id);
        $client = $this->clientRepository->getClient($order->getClientId());

        require_once __DIR__ . '/../views/order-view.php';
    }

    public function create()
    {
        $clients = $this->clientRepository->getClients();
        require_once __DIR__ . '/../views/order-create.php';
    }

    public function store()
    {
        $order = new Order();
        $order->setTitle($_POST['title']);
        $order->setStatus($_POST['status']);
        $order->setClientId($_POST['client_id']);
        $this->orderRepository->create($order);

        header('Location: ?');
    }

    public function edit(int $id)
    {
        $order = $this->orderRepository->getOrder($id);
        $clients = $this->clientRepository->getClients();
        require_once __DIR__ . '/../views/order-edit.php';
    }

    public function update()
    {
        $order = new Order();
        $order->setId($_POST['id']);
        $order->setTitle($_POST['title']);
        $order->setStatus($_POST['status']);
        $order->setClientId($_POST['client_id']);
        $this->orderRepository->update($order);

        header('Location: ?');
    }

    public function delete(int $id)
    {
        $this->orderRepository->delete($id);

        header('Location: ?');
    }
}