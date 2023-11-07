# PROJET SYMFONY / API REST - cci_exam_api

Bienvenue dans le projet Symfony "cci_exam_api" !
Dans ce document, vous trouverez les informations nécessaires pour lancer le projet et le comprendre.

## Installation

Pour installer ce projet, suivez ces 2 étapes :


1. Clonez le dépot github du projet dans l'emplacement de votre choix avec cette commande :

``` bash
git clone https://github.com/alphalyblob/cci_exam_api.git

ou 

git clone git@github.com:alphalyblob/cci_exam_api.git

```


2. Installez les dépendances avec composer à l'aide de la commande :

composer install


3. Créez la base de donées en configurant les paramètres dans le fichier '.env' et en exécutant les commandes suivantes :

php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force


4. Lancez le serveur de développement avec la commande :

php bin/console server:run



////////////////////////////////////////////////////////////////////////////////////////////

Configuration  
Avant tout, vérifiez d'avoir installé :
- php
- symfony-cli
- git
Assurez-vous de configurer les paramètres d'environnement appropriés dans le fichier .env pour personnaliser le projet en fonction de vos besoins. 

Utilisation
Découvrez comment utiliser ce projet en explorant la documentation dans le dossier docs. 

