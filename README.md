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

  L'arborescence des controllers/models/view doit être identique.

	Les classes de type Model doivent être une extension de la classe AbstractModel.class.php. Cette classe contient 1 méthode permettant de créer une connexio à la base et permet dond d'éviter de créer cette méthode dans chaque class. 
	Elle définit également un interface sur 3 méthodes (create, delete et find).

II. Informations nommage : 

	A. BDD
	
		1. nom de la base : "restaurant 101"
		2. user / mdp de la base : "root", "troiswa"

		Ces informations sont renseignées dans le fichie Application/config/database.php

