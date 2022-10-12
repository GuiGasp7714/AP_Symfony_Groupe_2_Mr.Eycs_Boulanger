# AP_Symfony_Groupe_2_Mr.Eycs_Boulanger
Ce projet est un AP réalisé dans le cadre de notre formation de 2ème année au BTS SIO de Satin Adjutor à Vernon. Il consistait à apréhender 2 nouveaux outils: Github et GitKraken, ainsi que le framework Symfony.

Ce ReadMe vous détaillera tout le nécessaire afin que le projet puisse fonctionner sur votre machine dans le cas où vous le téléchargeriez.

## Prérequis
Ce projet fut réalisé en local à travers le framework php symfony, il est donc nécessaire d'installer php sur sa machine. Afin de simplifier la manipulation ainsi que l'intsallation de symfony, on aura également besoin de composer. Il faudra également un SGBD utilisable en local comme WampServer ou MySQLServer.

- PHP version 7.1 minimum
- Composer
- WampServer / MySQLServer / etc.

## Installation Symfony 5/ SCOOP
La démarche d'installation de symfony peut se faire par une invite de commande powershell, on passera également par l'utilisation de SCOOP. Voici les quelques commandes à entrer:
```
Set-ExecutionPolicy RemoteSigned -Scope CurrentUser
irm get.scoop.sh | iex
scoop install symfony-cli
```
Pensez à vérifier vos autorisations si nécessaire.
## Require et import du projet
Quelques outils de symfony sont nécessaires à l'utilisation du projet. Quelques commandes supplémentaires sont nécessaires:
- ``` composer require make ```
- ``` composer require annotations ```
- ``` composer require twig ```
- ``` composer require form ```

Si vous souhaitez modifier le projet dans sa structure de façon plus poussée que ce qu'il n'a été fait, vous pouvez bien évidemment ajouter d'autres outils comme vous le souhaitez.

Pour le reste, il vous suffit de cloner le repository du projet sur votre machine.

## Mise en place de la base de donnée
Pour garantir le bon fonctionement du projet, il est nécessaire de correctement installer la base de donnée.
Après avoir créé une base de donnée du nom de "site_boulanger" sur le SGBD choisi, il suffit d'utiliser les commandes:
```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```
pour que la structure de la base de donnée soit automatiquement completée.

Si cela ne fonctionne pas, pensez à supprimer les migrations potentielles dans me dossier migrations du projet avant de réessayer les commandes.

Enfin, il vous faudra un jeu de test afin de vérifier le bon fonctionnement du projet.
Le seul élément à ajouter manuellement avant de lancer le site est une présentation dans la table Presentation de la base de donnée, peu importe son contenu. Il suffit d'en avoir un présent.

## Lancement du serveur Symfony
Il vous suffit à présent de lancer le serveur symfony au travers d'un terminal de commande.
veillez bien à vous placer dans le dossier "Site_Mr-Eycs" et utilisez la commande:
```
symfony serve:start
```
Dans le cas où vous auriez déjà tenté de le faire sans succes, pensez bien au cas où à utiliser la commande
```
symfony serve:stop
```
2 fois d'affilée pour être sur de son arret.
Vous devriez alors voir apparaitre une notification dans votre terminal avec un lien vers l'IP du site qui devrait fonctionner.

## Fonctionalités
Le site est pour l'instant simpliste mais voici ces fonctionnalités:
- Différentes pages pour consulter des informations extraites de la base de données liées
- La possibilité de se connecter et de créer un utilisateur
- La différenciation entre utilisateur lambda et administrateur
- La possibilité de laisser un avis sur le site qui sera stocké en base de données
- La possibilité pour un administrateur de supprimer des avis, ainsi que d'ajouter ou supprimmer des prestations
- Un formulaire de contact (pour l'instant on lié à un envoi de mail automatisé)

## Participants
Ce projet fut réalisé par:
- Guillot Gaspard
- Mirocha Arnaud
- Soufflard Esteban

### Si la moindre question ou proposition d'évolution du projet vous vient, vous pouvez nous contacter à ces adresses:
- Placeholder car pas envie de divulguer cette information pour un projet scolaire pour l'instant
- Placeholder car pas envie de divulguer cette information pour un projet scolaire pour l'instant
- Placeholder car pas envie de divulguer cette information pour un projet scolaire pour l'instant
