<?php

require_once __DIR__ . '/controllers/ClientController.php';
require_once __DIR__ . '/controllers/OrderController.php';

$clientController = new ClientController();
$orderController = new OrderController();

$action = $_GET['action'] ?? 'client-index'; 
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'client-view':
        $clientController->show($id);
        break;
    case 'client-create':
        $clientController->create();
        break;
    case 'client-index':
        $clientController->home();
        break;
    case 'client-store':
        $clientController->store();
        break;
    case 'client-edit':
        $clientController->edit($id);
        break;
    case 'client-update':
        $clientController->update();
        break;
    case 'client-delete':
        $clientController->delete($id);
        break;
    case 'order-view':
        $orderController->show($id);
        break;
    case 'order-create':
        $orderController->create();
        break;
    case 'order-index':
        $orderController->home();
        break;
    case 'order-store':
        $orderController->store();
        break;
    case 'order-edit':
        $orderController->edit($id);
        break;
    case 'order-update':
        $orderController->update();
        break;
    case 'order-delete':
        $orderController->delete($id);
        break;
    default:
        require_once __DIR__ . '/views/404.php';
        http_response_code(404);
        break;
}
