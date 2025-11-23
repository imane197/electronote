# 📦 ElectroNote - Plateforme de Kits Électroniques Personnalisés

## 🎯 Description

Application web full-stack permettant aux utilisateurs de consulter un catalogue de composants électroniques et de créer leur propre kit personnalisé avec calcul automatique du prix total en dirhams marocains (DH).

---

## 🏗️ Architecture du Projet

### Backend PHP (`/backend-php`)
- **Responsable :** Personne D
- **Statut :** ✅ Terminé et testé
- **Technologies :** PHP 8.0+, MySQL 8.0+
- **Routes API :** 4 routes métier (GET components, POST add-to-project, GET my-project, DELETE my-project)
- **Documentation :** [backend-php/README.md](backend-php/README.md)

### Frontend (À venir)
- **Responsables :** Personne A (Auth) + Personne B (Application)
- **Technologies :** HTML5, CSS3, JavaScript, Bootstrap 5

### Authentification (À venir)
- **Responsable :** Personne C
- **Technologies :** PHP Sessions, bcrypt

### Base de Données (En cours)
- **Responsable :** Personne E
- **Technologies :** MySQL, MERISE
- **Statut :** Structure créée, 5/19 composants insérés

---

## 🚀 Démarrage Rapide

### Prérequis
- XAMPP (Apache + MySQL)
- PHP 8.0+
- MySQL 8.0+

### Installation

1. **Clone le repository**
```bash
git clone https://github.com/imane197/electronote.git
cd electronote
```

2. **Configure la base de données**
- Lance XAMPP (Apache + MySQL)
- Va sur http://localhost/phpmyadmin
- Importe le fichier SQL (voir backend-php/README.md)

3. **Teste le backend**
```
http://localhost/electronote/backend-php/test/test_post.html
```

---

## 📚 Documentation

- **Backend API :** [backend-php/README.md](backend-php/README.md)
- **Tests manuels :** [backend-php/test/test_post.html](backend-php/test/test_post.html)

---

## 👥 Équipe

| Personne | Rôle | Statut |
|----------|------|--------|
| Personne hiba ibn chahid| Frontend Authentification | 🔄 En cours |
| Personne fatima ezzahrae rmili| Frontend Application | 🔄 En cours |
| Personne malak kebbaj| Backend Authentification | 🔄 En cours |
| **Personne imane boulaalam| **Backend Business Logic** | **✅ Terminé** |
| Personne manal eddahbi | Base de Données & MERISE | 🔄 En cours |

---

## 📅 Planning

- **Semaines 1-3 :** Développement modules individuels
- **Semaine 4 :** Intégration et tests
- **Présentation finale :** 10 Décembre 2024

---

## 📊 Statut Actuel

### ✅ Fonctionnel
- Backend PHP avec 4 routes API
- Base de données de test (5 composants)
- Tests manuels validés

### 🔄 En développement
- Frontend complet
- Système d'authentification final
- Base de données complète (19 composants)

---

## 🔗 Liens Utiles

- **Repository :** https://github.com/imane197/electronote
- **Backend API :** [Documentation complète](backend-php/README.md)

---

## 📝 Licence

Projet académique - 2024