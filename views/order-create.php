<?php require_once __DIR__ . '/templates/header.php'; ?>

<h2 class="mb-4">⊕ Créer une nouvelle commande</h2>

<form action="?action=order-store" method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Statut (en cours / expédiée / livrée) :</label>
        <input type="text" class="form-control" id="status" name="status" required>
    </div>
    <div class="mb-3">
        <label for="client_id" class="form-label">Client :</label>
        <select class="form-control" name="client_id" id="client_id">
            <option value="-">- Sélectionnez le client</option>
        <?php foreach ($clients as $client): ?>
            <option value="<?= $client->getId() ?>"><?= $client->getName() ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<a href="?" class="btn btn-secondary">Retour à la liste</a>

<?php require_once __DIR__ . '/templates/footer.php'; 