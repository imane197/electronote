# Backend PHP - Gestion Composants Électroniques (Personne D)

## 📋 Description

Backend PHP pour la gestion de composants électroniques et la création de kits personnalisés.
Implémentation des 4 routes API métier conformément à l'architecture du projet.

## 🏗️ Architecture

Conforme au document de conception du projet (PDF fourni).
Backend PHP pur avec architecture REST API.

## 📁 Structure
```
backend-php/
├── config/
│   └── database.php          # Connexion MySQL
├── controllers/
│   └── BusinessController.php # 4 routes API métier
├── test/
│   ├── fake_auth.php         # Auth temporaire (sera remplacé)
│   └── test_post.html        # Tests manuels
└── index.php                  # Routeur principal
```

## 💾 Base de Données

### Tables utilisées (3 tables)

1. **users** - Utilisateurs (créée pour tests, gérée par Personne C)
2. **components** - 5 composants de test (19 composants seront ajoutés par Personne E)
3. **user_project_components** - Relation N-N entre utilisateurs et composants

### Composants de test (5)

| ID | Nom | Catégorie | Prix (DH) |
|----|-----|-----------|-----------|
| 1 | Arduino Uno R3 | Microcontrôleurs | 250.00 |
| 2 | DHT22 | Capteurs | 45.00 |
| 3 | Servo SG90 | Actuateurs | 25.00 |
| 4 | LCD 16x2 | Affichage | 35.00 |
| 5 | Breadboard 830 | Accessoires | 15.00 |

## 🔌 Routes API (4 routes)

### 1. GET /index.php?route=components
**Description :** Liste tous les composants disponibles

**Paramètres optionnels :**
- `categorie` : Filtrer par catégorie

**Exemples :**
```
GET /index.php?route=components
GET /index.php?route=components&categorie=Capteurs
```

**Réponse :**
```json
[
  {
    "id": "1",
    "nom": "Arduino Uno R3",
    "categorie": "Microcontrôleurs",
    "prix": "250.00",
    "description": "Microcontrôleur de base",
    "stock": "100"
  }
]
```

---

### 2. POST /index.php?route=add-to-project
**Description :** Ajouter un composant au projet de l'utilisateur

**Headers :**
```
Content-Type: application/json
```

**Body :**
```json
{
  "component_id": 1,
  "quantite": 2
}
```

**Réponse :**
```json
{
  "success": true,
  "message": "Composant ajouté au projet"
}
```

**Notes :**
- Si le composant existe déjà, la quantité est incrémentée
- Nécessite une session utilisateur active

---

### 3. GET /index.php?route=my-project
**Description :** Récupérer le projet de l'utilisateur avec calcul du total

**Réponse :**
```json
{
  "components": [
    {
      "id": "1",
      "nom": "Arduino Uno R3",
      "categorie": "Microcontrôleurs",
      "prix": "250.00",
      "quantite": "2",
      "sous_total": "500.00"
    }
  ],
  "total": 500
}
```

**Notes :**
- Utilise un JOIN SQL pour récupérer les détails complets
- Calcul automatique des sous-totaux et du total
- Nécessite une session utilisateur active

---

### 4. DELETE /index.php?route=my-project
**Description :** Supprimer un composant du projet

**Headers :**
```
Content-Type: application/json
```

**Body :**
```json
{
  "component_id": 1
}
```

**Réponse :**
```json
{
  "success": true,
  "message": "Composant supprimé"
}
```

**Notes :**
- Nécessite une session utilisateur active

---

## 🔒 Sécurité

- ✅ Requêtes préparées (protection SQL Injection)
- ✅ Validation des données entrantes
- ✅ Gestion des sessions utilisateur
- ✅ Headers CORS configurés
- ✅ Codes HTTP appropriés (200, 400, 401, 404, 500)

## 🧪 Tests

### Installation

1. Importer le SQL dans phpMyAdmin :
```sql
-- Voir le fichier SQL fourni dans la base de données
```

2. Configurer XAMPP :
   - Démarrer Apache
   - Démarrer MySQL

### Tests manuels

**Méthode 1 : Navigateur**
```
http://localhost/backend-php/test/test_post.html
```

**Méthode 2 : Navigateur direct**
```
http://localhost/backend-php/index.php?route=components
```

### Authentification temporaire

Pour tester les routes protégées :
```
http://localhost/backend-php/test/fake_auth.php
```

⚠️ **Note :** Ce système sera remplacé par l'authentification de Personne C

---

## 🔗 Intégration avec les autres modules

### Frontend (Personne A/B)
```javascript
// Exemple d'appel depuis le frontend
fetch('http://localhost/backend-php/index.php?route=components')
  .then(response => response.json())
  .then(data => console.log(data));
```

### Authentification (Personne C)
- Remplacer `test/fake_auth.php` par le vrai système d'auth
- Les routes utilisent déjà `$_SESSION['user_id']`
- Compatible avec l'architecture prévue

### Base de données (Personne E)
- Ajouter les 14 composants restants dans la table `components`
- Les requêtes SQL sont déjà optimisées
- Structure des tables respectée

---

## ⚙️ Configuration

### Prérequis
- PHP 8.0+
- MySQL 8.0+
- XAMPP (ou Apache + MySQL)

### Configuration base de données

Fichier : `config/database.php`
```php
private $host = "localhost";
private $username = "root";
private $password = "";
private $database = "composants_db";
```

---

## 📊 Statut du projet

### ✅ Fonctionnalités implémentées
- [x] Connexion base de données
- [x] 4 routes API métier
- [x] Gestion des sessions
- [x] Validation des données
- [x] Gestion des erreurs
- [x] Calcul automatique des totaux
- [x] Tests manuels fonctionnels

### 🚀 Prêt pour l'intégration
- Backend testé et fonctionnel
- Documentation complète
- Code propre et commenté
- Architecture respectée

---

## 👥 Développeur

**IMANEBOULAALAM** - Backend Business Logic

---


Les autres membres de l'équipe peuvent intégrer ce backend dès maintenant.