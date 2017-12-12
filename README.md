# restaurant3wa101
P rojet pédagogique 3WA - Formation développeur web

glossaire :

    spl_autoload_register : fonction définie par PHP qui définit le processus d'auto-chargement des classes.

    Dans une vraie application, on chargerait une classe dont le construct contiendrait l'autoload qui irait charger toutes les classes. On créé une instance de cette classe dans l'index.php qui permet ensuite de pouvoir tout utiliser directement. C'est théoriquement la seule variable qu'on aura en dehors d'une classe.

    namespace : première ligne à entrer dans une Class. La bonne pratique est de respecter l'arborescence des dossiers de l'application.
    ex : namespace restau\library
    C'est utilisé pour repérer le dossier dans lequel est cette class.



suggestion :

    Installer composer : outil permettant de gérer l'autoload de manière efficace et automatique.


Fonctionnement du mini-framework :

I. Arborescence des dossiers, fichiers et nommage des classes

  Organisation des classes en fonction des types de classes (controllers, etc.) avec un sous-dossier par classe (ex : application/controllers/meal), nommage du fichier class (ex : Mealcotroller.php) et nommage de la classe (ex : mealController).

  Le nommage des dossiers, fichiers et classes est donc important pour que l'autoload puisse fonctionner et que les classes puissent être identifiées par le système.

  L'arborescence des controllers et view doit être identique. 
  Les fichiers controllers doivent contenir une classe unique nommée au format <NomDeClasseController.class.php>
  Les fichiers view doivent contenir un fichier unique au format <NomDeClasseView.phtml> et contiendra le html/php qui viendra s'intercaler dans le main du layoutView.


II. Informations diverses :

	A. BDD

		1. nom de la base : "restaurant 101"
		2. user / mdp de la base : "root", "troiswa"
		3. Base : à créer puis importer le contenu via le fichier bdd_restaurant.sql

		Ces informations sont renseignées dans le fichier Application/config/database.php

	B. Documentation

		L'accès à la documentation est accessible via le localHost (<racine de l'application>/www/build/restaurant).

		  Il est nécessaire d'installer composer et Sami:
		  - composer require symfony/Finder
		  - composer require sami/sami

		  Première exécution :
			  Conserver le fichier config présent dans le repository (www/config/config.php) et entrer la commande suivante dans le terminal :
			  - php vendor sami/sami/sami.php render www/config.php

		  Commande de mise à jour de la doc :
			  - php vedor/sami/sami.php update www/config/config.php
