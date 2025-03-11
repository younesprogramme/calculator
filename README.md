# Simple Calculatrice 

## Cloner le repository
git clone  https://github.com/younesprogramme/calculator.git

## Installer les dépendances
```
composer install
```
## Configurer l'environnement
```
cp .env.example .env
php artisan key:generate
```

## Migrations & seeders
```
php artisan migrate --seed
```
## Lancer l'application
```
php artisan serve
```
## Lien de la page Calculatrice
```
http://127.0.0.1:8000/calculator
```
