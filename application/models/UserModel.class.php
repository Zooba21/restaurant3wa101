<?php

class UserModel extends AbstractModel
{
  /**
   * [SQL String correspondant à la chaîne de caractère permettant de récupérer une adresse e-mail correspondant à ce qui a été inscrit dans le formulaire de connexion]
   * @var string
   */

   const SQL =
    "SELECT U.`inscriptionDate`, U.`mail`, P.`password`, U.`rights`, U.`id`, U.`name`, U.`firstName`, RU.`url`, RU.`alt`
    FROM `user` as U
    INNER JOIN `password` as P on P.`userId`=U.`id`
    LEFT JOIN `ressourcesUser` as RU on RU.`userId`=U.`id` 
    WHERE `mail`=?
    AND `password`=?";
  /**
   * [login Envoi une requête pour récupérer les informations utilisateurs correspondant à ce qui a été saisi dans le formulaire de connexion, si elles existent,]
   * @param  [array] $queryFields [e-mail inscrit dans le formulaire]
   * @return [array_assoc]              [Tableau associatif contenant les mails, passwords et niveau de droit de l'utilisateur].
   */
  public function login(array $queryFields)
  {
    var_dump($queryFields);
    $result = $this->database->queryOne(self::SQL, $queryFields);
    var_dump($result);
    return($result);
  }

}


 ?>
