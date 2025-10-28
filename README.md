# Projet Blog Laravel

Ce dépôt contient une application Laravel (squelette) adaptée pour un projet simple avec les modèles `User` et `Article`.

Résumé rapide
- Framework : Laravel ^12
- PHP : >= 8.2
- Frontend : Vite + Tailwind (dépendances dans `package.json`)
- Base : migrations, factories et seeders inclus

Prérequis
- PHP >= 8.2
- Composer
- Node.js (pour Vite / assets) et npm
- Une base de données (SQLite, MySQL, Postgres — exemples ci-dessous)

Installation (rapide)
1. Cloner le dépôt

```cmd
git clone <url-du-depot> pooLaravel
cd pooLaravel
```

2. Installer les dépendances PHP et JS, copier l'environnement et générer la clé

```cmd
composer install
copy .env.example .env
php artisan key:generate
npm install
```

Si vous utilisez SQLite :

```cmd
php -r "file_exists('database/database.sqlite') || copy('database/database.sqlite', 'database/database.sqlite');"
rem database\database.sqlite
```
(la commande ci-dessus crée le fichier sqlite si nécessaire — sous Windows, vous pouvez aussi créer le fichier manuellement)

- Seeders :
  - `DatabaseSeeder.php` crée au moins un utilisateur de test (`test@example.com`).
  - `ArticlesTableSeeder.php`

Pour migrer et lancer les seeders :

```cmd
php artisan migrate
php artisan db:seed
```

Structure importante
- `app/Models/User.php` — modèle utilisateur (Authenticatable). Utilise `HasFactory`.
- `app/Models/Article.php` — modèle Article avec les attributs `title`, `content`, `user_id` et relation `user()`.
- `app/Http/Controllers/` — contrôleurs (squelettique, contient `Controller.php`).
- `resources/views/welcome.blade.php` — vue d'accueil utilisée par la route `/`.
- `routes/web.php` — route principale : renvoie la vue `welcome`.
- `database/factories/` — factories pour User et Article.

Scripts utiles (depuis `composer.json` et `package.json`)
- Composer :
  - `composer setup` — script personnalisé qui installe les dépendances, copie `.env`, génère la clé, exécute les migrations et construit les assets (utile pour mise en place automatisée).
  - `composer dev` — démarre simultanément le serveur artisan, la queue, pail et Vite (via `concurrently`).
  - `composer test` — nettoie la config et lance les tests (`php artisan test`).

- NPM :
  - `npm run dev` — démarre Vite en dev
  - `npm run build` — construit les assets pour la production

Exemples de commandes pour le cycle de développement

```cmd
rem Installer tout
composer install && npm install
copy .env.example .env
php artisan key:generate

rem Lancer le serveur local (port par défaut 8000)
php artisan serve

rem Lancer Vite en développement (assets)
npm run dev

rem Exécuter les tests
composer test
```

Points d'attention et notes
- Le modèle `Article` contient des méthodes d'accès (`getTitleContentAttribute`) et de modification (`setTitleContentAttribute`) personnalisées : elles semblent essayer de gérer le title et le content ensemble. Attention : la signature de `setTitleContentAttribute` telle qu'écrite actuellement prend deux paramètres — cela n'est pas la signature standard attendue par les mutateurs d'Eloquent et pourrait nécessiter une relecture si vous rencontrez des comportements inattendus.
- `ArticlesTableSeeder.php` est vierge — si vous voulez des articles de test, ajoutez la logique correspondante ou utilisez la factory `ArticleFactory`.

Tests
- Le projet inclut PHPUnit et des tests d'exemple sous `tests/`.
- Lancer :

```cmd
composer test
```

Déploiement
- Pour une build de production des assets :

```cmd
npm run build
php artisan migrate --force
```

Comment contribuer
- Forkez le dépôt, créez une branche feature, puis ouvrez une pull request. Respectez les conventions PSR et lancez les tests avant de proposer la PR.

Licence
- Projet basé sur le squelette Laravel (MIT). Voir `composer.json` pour la licence des dépendances.

Contact rapide / aide
- Si vous voulez que je complète le seeder `ArticlesTableSeeder`, corrige le mutateur dans `Article.php` ou que je génère des routes/API pour les articles (index, show, store, update, delete), dis-le-moi et je m'en charge.

---
Généré automatiquement à partir de l'analyse du dépôt (2025-10-28).
