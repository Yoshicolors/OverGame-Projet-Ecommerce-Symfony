Baptiste Bro.

OverGame

Commandes pour installer :

git clone <(l'url)>

cd symfony_boilerplate-main

composer install

cp .env .env.local

# Pour MySQL
DATABASE_URL="mysql://utilisateur:motdepasse@127.0.0.1:3306/overgame?serverVersion=8.0.32&charset=utf8mb4"

# Pour MariaDB
DATABASE_URL="mysql://utilisateur:motdepasse@127.0.0.1:3306/overgame?serverVersion=10.11.2-MariaDB&charset=utf8mb4"

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
symfony server:start

Administrateur

Email : admin@overgame.com
Mot de passe : admin123