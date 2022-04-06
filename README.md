# Kanban Board
_(Informations générales)_

[![forthebadge](https://forthebadge.com/images/badges/built-by-developers.svg)](https://forthebadge.com)

Lors de l'UE SIR que nous avons suivi en M1 MIAGE à l'Université Rennes 1, il nous a été demandé de réaliser un projet en deux parties; la première partie représente le back-end sous forme d'API afin d'afficher un Kanban Board.

## Pour commencer

Avant toute chose, le fichier .env présent à la racine de ce projet doit être modifié avec les identifiants de base de données à utiliser, ainsi que le type de Base de Données utilisé.

### Pré-requis

Les pré-requis essentiels pour la bonne exécution du projet sur un poste local

- PHP à la version 8.0 ou supérieure
- Composer 
- Symfony 
- Wamp/Mamp avec une version de MySQL 5.7 mini

### Installation

Les étapes pour installer l'API : 


1) Executez la commande ``symfony check:requirements`` pour savoir quel composant vous devez installer.

2) Ensuite, ``php bin/console doctrine:database:create`` pour créer votre base de données.

3) Exécutez la commande ``php bin/console doctrine:migrations:migrate`` pour migrer le schéma créé.

4) Enfin, générez les fixtures grâce à ``php bin/console doctrine:fixtures:load``


## Démarrage

Executez la commande ``symfony server:start`` pour commencer ensuite se rendre sur http://localhost:8000/api

## Fabriqué avec

* [Symfony](http://fony.com/releases/6.0) - Symfony 6 (back-end)
* [API Platform](https://api-platform.com/) - Surcouche API


## Versions
Listez les versions ici 
_exemple :_
**Dernière version stable :** 1.5.7
**Dernière version :** 1.5.6

## Auteurs
Listez le(s) auteur(s) du projet ici !
* **Maxime VARLOTEAUX** _alias_ [@varliche](https://github.com/varliche)
* **Adeline BRUNEAU** _alias_ [@adbruneau](https://github.com/adbruneau)


