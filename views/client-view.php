<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">📋 Détail du client</h2>

<p><strong>Nom : </strong> <?= $client->getName() ?></p>
<p><strong>Email : </strong> <?= $client->getEmail() ?></p>
<p><strong>Téléphone : </strong> <?= $client->getTelephone() ?></p>
<p><strong>Créée le : </strong> <?= $client->getCreatedAt() ?></p>
<p><strong>Dernière mise à jour : </strong> <?= $client->getUpdatedAt() ?></p>

<?php if (!empty($orders)): ?>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Statut</th>
                <th>Créé le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order): ?>

                <tr>

                    <td><?= $order->getId(); ?></td>
                    <td><a href="?action=order-view&id=<?= $order->getId() ?>"><?= $order->getTitle(); ?></a></td>
                    <td><?= $order->getStatus(); ?></td>
                    <td><?= $order->getCreatedAt() ?></td>
                    <td>
                        <a href="?action=order-view&id=<?= $order->getId() ?>" class="btn btn-primary btn-sm">👀</a>
                        <a href="?action=order-edit&id=<?= $order->getId() ?>" class="btn btn-warning btn-sm">✏️</a>
                        <a onclick="return confirm('T’es sûr ?');" href="?action=delete&id=<?= $order->getId() ?>" class="btn btn-dark btn-sm">❌</a>
                    </td>

                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>

    <p><strong>Aucune commande pour ce client</strong></p>

<?php endif; ?>

<a href="?action=client-edit&id=<?= $client->getId() ?>" class="btn btn-warning">Modifier le client</a>
<a href="?" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php'; 