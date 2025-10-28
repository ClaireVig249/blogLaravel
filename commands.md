## Commandes utilisées 

Installer Laravel et Initialisation du projet avec Composer
```bash
composer global require laravel/laravel installer
composer create-project --prefer-dist laravel/laravel pooLaravel
```

Installation des dépendances
Création d'un model
```bash
composer install
php artisan make:model Artisan
```

Création et execution d'une migration
Lancer la console php
```bash
php artisan make:migration create_articles_table
php artisan migrate

php artisan tinker
```

Créer un seeder
```bash
php artisan make:seeder ArticlesTableSeeder
php artisan migrate db:seed

- Rafraichir la console
composer dump-autoload
```
