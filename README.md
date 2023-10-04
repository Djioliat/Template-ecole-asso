# Template-ecole-asso
Template association parent d'élèves afin de pouvoir disposer d'une application web pour diffuser les informations des évènements !  
Votre participation est la bienvenue :)

# Installation 
git clone https://github.com/Djioliat/Template-ecole-asso.git

# Modifier la valeur de connexion pour la Base de données dans le fichier d'environnement (exemple pour mysql :
DATABASE_URL="mysql://root:Motdepasse@127.0.0.1:3306/name?mariadb=15.1&charset=utf8mb4"

# Créer la base de données 
php bin/console doctrine:database:create

# Migrations 
php bin/console make:migration
php bin/console doctrine:migrations:migrate



