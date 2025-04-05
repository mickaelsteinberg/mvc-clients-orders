<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">📋 Détail du client</h2>

<p><strong>Nom : </strong> <?= $client->getName() ?></p>
<p><strong>Email : </strong> <?= $client->getEmail() ?></p>
<p><strong>Téléphone : </strong> <?= $client->getTelephone() ?></p>
<p><strong>Créée le : </strong> <?= $client->getCreatedAt() ?></p>
<p><strong>Dernière mise à jour : </strong> <?= $client->getUpdatedAt() ?></p>


<a href="?action=client-edit&id=<?= $client->getId() ?>" class="btn btn-warning">Modifier le client</a>
<a href="?" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php'; 