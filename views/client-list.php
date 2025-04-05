<?php require_once __DIR__ . '/templates/header.php'; ?>
        
<h2 class="mb-4">📋 Liste des clients</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Créé le</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clients as $client): ?>

            <tr>

                <td><?= $client->getId(); ?></td>
                <td><a href="?action=client-view&id=<?= $client->getId() ?>"><?= $client->getName(); ?></a></td>
                <td><?= $client->getEmail(); ?></td>
                <td><?= $client->getTelephone(); ?></td>
                <td><?= $client->getCreatedAt() ?></td>
                <td>
                    <a href="?action=client-view&id=<?= $client->getId() ?>" class="btn btn-primary btn-sm">👀</a>
                    <a href="?action=client-edit&id=<?= $client->getId() ?>" class="btn btn-warning btn-sm">✏️</a>
                    <a onclick="return confirm('T’es sûr ?');" href="?action=delete&id=<?= $client->getId() ?>" class="btn btn-dark btn-sm">❌</a>
                </td>

            </tr>

        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/templates/footer.php';
