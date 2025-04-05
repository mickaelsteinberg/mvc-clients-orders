<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">📋 Détail de la commande</h2>

<h3>Commande passée par : <?= $client->getName() ?></h3>

<a href="?action=client-view&id=<?= $client->getId() ?>">Voir le client</a>

<p><strong>Titre : </strong> <?= $order->getTitle() ?></p>
<p><strong>Status : </strong> <?= $order->getStatus() ?></p>
<p><strong>Créée le : </strong> <?= $order->getCreatedAt() ?></p>
<p><strong>Dernière mise à jour : </strong> <?= $order->getUpdatedAt() ?></p>

<a href="?action=order-edit&id=<?= $order->getId() ?>" class="btn btn-warning">Modifier la commande</a>
<a href="?" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php';