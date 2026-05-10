# 🎟️ Plateforme de Gestion d'Événements

---
## 🏗️ Architecture et Choix Techniques

Pour répondre aux exigences du projet tout en garantissant un code propre et maintenable, la stack suivante a été choisie :

### 1. Backend : Laravel (Mode API)
* **Pourquoi ?** Laravel offre un écosystème robuste pour créer des API RESTful rapidement. 
* **Points forts de l'implémentation :**
    * Mise en place d'une gestion d'exceptions centralisée (`ApiException`) garantissant que le frontend reçoit **toujours** le même format JSON d'erreur (avec des codes métier clairs comme `VALIDATION_FAILED` ou `CAPACITY_REACHED`).
    * Respect strict des codes HTTP (200, 201, 400, 404, 422, etc.).
    * Dates standardisées au format **ISO 8601** pour une compatibilité parfaite avec le client.

### 2. Frontend : React (Vite + TypeScript)
* **Pourquoi ?** React permet de construire des interfaces modulaires et dynamiques. TypeScript a été ajouté pour sécuriser le typage des retours de l'API.
* **Points forts de l'implémentation :**
    * **TanStack Query (React Query) :** Utilisé pour la gestion du cache, l'invalidation automatique des listes après modification, et la gestion native des états de chargement (`isPending`).
    * **React Hot Toast :** Notifications contextuelles (succès, erreurs de validation) pour un retour visuel immédiat (UX).
    * UI responsive et soignée.

### 3. Base de données : SQLite
* **Pourquoi ?** Afin de faciliter l'évaluation de ce test technique, j'ai opté pour SQLite. Ce choix offre un environnement "Plug & Play" : **aucune configuration de base de données externe (MySQL/PostgreSQL) ou de conteneur Docker n'est requise de votre part.** L'API est testable localement et instantanément.

---

## 🚀 Installation et Lancement

### Prérequis
* PHP 8.2+ et Composer
* Node.js 18+ et npm/yarn/bun | pour ce projet, j'ai utiliser bun pour sa performance et sa rapidité

### 1. Lancement du Backend (Laravel)

Ouvrez un terminal et naviguez dans le dossier `backend` :

```bash
cd backend

# 1. Installer les dépendances
composer install

# 2. Configurer l'environnement
cp .env.example .env
php artisan key:generate

# 3. Préparer la base de données (SQLite)
# La base sera créée automatiquement lors de la migration
php artisan migrate

# 4. Lancer le serveur local
php artisan serve
```

L'API sera accessible sur http://localhost:8000.


### 1. Lancement du Frontend (Laravel)

Ouvrez un terminal et naviguez dans le dossier `frontend` :


```bash
cd frontend

# 1. Installer les dépendances
npm install

# 2. Lancer le serveur de développement Vite
npm run dev
```

L'application Web sera accessible sur http://localhost:5173

