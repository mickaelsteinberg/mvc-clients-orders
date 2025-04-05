# MVC Simple en PHP - Gestion de clients et commandes

## Architecture du projet

```
/mvc-clients-orders
|- /controllers
|  |- ClientController.php 
|  |- OrderController.php
|- /lib
|  |- database.php
|- /models
|  |- /repositories
|  |  |- ClientRepository.php
|  |  |- OrderRepository.php
|  |- Client.php
|  |- Order.php
|- /views
|  |- /templates
|  |  |- footer.php
|  |  |- header.php
|  |- 404.php
|  |- client-create.php
|  |- client-edit.php
|  |- client-list.php
|  |- client-view.php
|  |- order-create.php
|  |- order-edit.php
|  |- order-list.php
|  |- order-view.php
|- index.php
|- README.md
```

## Comment faire un lien 1-N entre deux tables 

### Mettre à jour la couche Model

#### Créer la colonne avec la clé étrangère dans la table Order

```sql
ALTER TABLE orders
ADD COLUMN client_id INT NULL;

/**
 *  SOIT DELETE CASCADE, SOIT DELETE SET NULL
 */ 

ALTER TABLE orders -- on modifie la table orders
ADD CONSTRAINT fk_orders_clients -- on nomme la contrainte
FOREIGN KEY (client_id) REFERENCES clients(id) -- on établie une clé étrangère sur le champ client_id vers clients.id
-- SOIT
ON DELETE CASCADE; -- si le client est supprimé, toutes ses commandes le seront aussi
-- SOIT
ON DELETE SET NULL; -- si le client est supprimé, le champ client_id de orders devient NULL
```

#### Ajouter le champ client_id dans le model Order

- Ajouter le champ `private int $clientId;` 
- Le getter et le setter 
   - `public function getClientId(): int {...}`
   - `public function setClientId(int $clientId): void {...}`

#### Modifier les méthodes d'hydratation dans le repository OrderRepository

- `getOrders()` : cf. ligne 26
- `getOrder(int $id)` : cf. ligne 71
- `create(Order $order)` : 
   - modifier la requête `INSERT INTO` pour ajouter le champ `client_id`
      - cf. ligne 87
   - modifier le statement execute pour gérer le nouveau paramètre 
      - cf. ligne 101
- `update(Order $order)` : 
   - idem que pour la méthode `create()`

#### Ajouter une méthode dans OrderRepository pour récupérer les commandes pour un client

- `public function getOrdersByClientId(int $id): array {...}`
   - cf. ligne 36

### Mettre à jour la couche Controller

#### Pour afficher les commandes pour un client

- Dans le controller `ClientController.php`, appeler le `OrderRepository` 
   - cf. `ClientController.php` ligne 9 / 14 
- Dans les fonctions qui requièrent d'afficher les commandes pour chaque client, récupérer les commandes avec la nouvelle fonction `getOrdersByClientId()` du `OrderRepository`
   - cf. `ClientController.php` ligne 27
- Dans la vue afférente, afficher les commandes sous forme de tableau
   - cf. `client-view.php` ligne 11 jusqu'à 47

#### Pour afficher le client d'une commande

- Dans le controller `OrderController.php`, appeler le `ClientRepository`
   - cf. `OrderController.php` ligne 9 / 14 
- Dans les fonctions qui requièrent d'afficher le client pour la commande, récupérer le client avec la fonction `getClient` du `ClientRepository` grâce au champ `client_id` de la commande
   - cf. `OrderController.php` ligne 27
- Dans la vue afférente, afficher le client 
   - cf. `order-view.php` ligne 5

## Pour aller plus loin

- Dans la vue pour ajouter une commande, ajouter un champ `<select>` qui contient tous les clients pour pouvoir insérer dans la table `orders` le `client_id`
   - Dans le controller `OrderController.php`, passer la liste des clients aux vues create et edit pour enregistrer en base
      - cf. ligne 34 / 52 
   - Dans les vues `order-create.php` et `order-edit.php` ajouter les selects
      - cf. ligne 16 à 21 dans les 2 fichiers
- Pour sauvegarder en base de données, modifier les méthodes `store` et `update` 
   - cf. ligne 43 / 62

...