# MediTrace — Système hospitalier (PHP MVC)

Version corrigée et complète : enregistrement des données fonctionnel,
notifications dynamiques, sécurité CSRF, gestion des rôles.

## 🚀 Installation (XAMPP / WAMP / MAMP)

1. Copiez le dossier `MediTrace-MVC/` dans `htdocs/` (XAMPP) ou `www/` (WAMP).
2. Démarrez **Apache + MySQL**.
3. Ouvrez **phpMyAdmin** → onglet **Importer** → sélectionnez `sql/meditrace.sql` → exécutez.
4. Ouvrez `http://localhost/MediTrace-MVC/`.
5. **TRÈS IMPORTANT** — visitez UNE fois `http://localhost/MediTrace-MVC/index.php?p=connexion/seed`
   pour régénérer les vrais hashes des mots de passe démo.
6. Connectez-vous avec un compte démo (voir `COMPTES_DEMO.txt`).

## ✅ Ce qui a été corrigé par rapport à la v1

| # | Correction |
|---|---|
| 1 | **Tous les formulaires** envoient maintenant correctement leurs données (plus de `action="#"`) |
| 2 | **Tous les contrôleurs** traitent les POST (INSERT en base + redirection PRG) |
| 3 | **Système de notifications** : toast vert ✅ ou rouge ❌ après chaque action, auto-dismiss 4s |
| 4 | **Modèles complets** : `ajouter()` pour Patient, Personnel, Chambre, RDV, Consultation, Ordonnance, Examen, ConstantesVitales, Soin, Urgence, Hospitalisation, Facture, Paiement, Demandes |
| 5 | **Schéma SQL étendu** : 16 tables couvrant tout le workflow hospitalier |
| 6 | **Protection CSRF** sur tous les formulaires |
| 7 | **Contrôle d'accès par rôle** activé (`requireRole()`) |
| 8 | **Champs harmonisés** (`sexe` au lieu de `genre`, valeurs M/F) |
| 9 | **Page `/connexion/seed`** pour régénérer les hashes démo |
| 10 | **Liaison patient ↔ utilisateur** (chaque patient connecté voit ses propres données) |

## 🔑 Comptes de démonstration

Voir `COMPTES_DEMO.txt`.

## 🧭 URLs principales

| URL | Effet |
|---|---|
| `index.php` | Accueil |
| `index.php?p=connexion/login` | Connexion |
| `index.php?p=connexion/inscription` | Inscription patient |
| `index.php?p=connexion/seed` | **Réinitialiser les mots de passe démo** (à faire 1 fois) |
| `index.php?p=administrateur/dashboard` | Dashboard admin |
| `index.php?p=medecin/dashboard` | Dashboard médecin |
| `index.php?p=infirmier/dashboard` | Dashboard infirmier |
| `index.php?p=patient/dashboard` | Dashboard patient |

## 🛠 Architecture MVC

```
core/           Router, Controller (avec flash + CSRF), Model, View, Database
config/         Paramètres BDD
app/models/     16 modèles (1 par entité métier)
app/controllers/ 6 contrôleurs (Accueil, Connexion, Admin, Medecin, Infirmier, Patient)
app/views/      Vues (HTML + Tailwind via CDN), avec partial flash auto-injecté
sql/            meditrace.sql — schéma complet + données de démo
```

## 🧪 Vérifier que la BDD reçoit bien les données

Après quelques tests dans l'interface, ouvrez phpMyAdmin :

```sql
SELECT * FROM patients ORDER BY id DESC LIMIT 5;
SELECT * FROM consultations ORDER BY id DESC LIMIT 5;
SELECT * FROM factures ORDER BY id DESC LIMIT 5;
```

Vous devez voir vos saisies. Si une notification verte ✅ s'affiche après
le formulaire, la donnée est en base.

## 🔒 Sécurité

- Mots de passe hashés avec `password_hash()` (bcrypt)
- Sessions PHP pour l'authentification
- Tokens CSRF sur tous les formulaires
- Requêtes préparées PDO (anti-injection SQL)
- `requireRole()` actif sur chaque dashboard
