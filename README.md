# Répertoire officiel de l'équipe T'zards & Chapeau de paille

## Contexte

Fruit d'un travail acharné entre étudiants, de la consommation de quelques dizaines de tasses de café et Redbulls (pas de sponsoring promis), ainsi que quelques dodos furtifs, ce répertoire est le résultat de notre travail pour la _Nuit de l'Info_. L'objectif était de créer une solution permettant la collecte d'informations liées à la pratique du surf, pour traitement futur par Surfrider, une association luttant contre la dégradation des milieux marins. L'enjeu était double : investir les surfeurs dans cette cause via la collecte de données, en proposant une solution leur apportant des bénéfices en échange, et donner les moyens à Surfrider de réaliser leurs actions avec des données concrètes à l'appui.

## Fonctionnement

Le projet est découpé de la partie suivante :
- backend : une API en PHP pour traiter les requêtes de notre app frontend
- frontend : interface proposée à l'utilisateur, composée de deux frameworks React et Vue, orchestrés par Single-Spa, une solution permettant de synchroniser différents composants fonctionnant à partir de différents frameworks.
- mobile_app : une application permettant au surfeur d'enregistrer des sessions de surf et saisir des alertes
- vendor : fichiers composers pour installer les librairies et dépendances

## Lancement 

Le frontend se lance via npm install (pour installer les dépendances) puis npm start. Le backend se lance via un serveur Apache. L'application mobile se lance via npm install (pour les dépendances) et npm run web.