<?php

class UserModel extends AbstractModel
{
  /**
   * [SQL String correspondant à la chaîne de caractère permettant de récupérer une adresse e-mail correspondant à ce qui a été inscrit dans le formulaire de connexion]
   * @var string
   */

   const SQL =
    "SELECT U.`address`, U.`address2`, U.`city`, U.`postCode`, U.`phone`, U.`inscriptionDate`, U.`mail`, U.`rights`, U.`id`, U.`name`, U.`firstName`, RU.`url`, RU.`alt`
    FROM `user` as U
    INNER JOIN `password` as P on P.`userId`=U.`id`
    LEFT JOIN `ressourcesUser` as RU on RU.`userId`=U.`id`
    WHERE `mail`=?
    AND `password`=?";

    const SQL_UPDATE =
    "SELECT U.`address`, U.`address2`, U.`city`, U.`postCode`, U.`phone`, U.`inscriptionDate`, U.`mail`, U.`rights`, U.`id`, U.`name`, U.`firstName`, RU.`url`, RU.`alt`
    FROM `user` as U
    LEFT JOIN `ressourcesUser` as RU on RU.`userId`=U.`id`
    WHERE `mail`=?";

    const SQL_AVATAR_UPDATE =
    "UPDATE `ressourcesUser`
    SET `alt`=? , `url`=?
    WHERE `userId`=?";

    const SQL_AVATAR_INSERT =
    "INSERT INTO `ressourcesUser` (`alt`,`url`,`userId`)
    VALUES (?,?,?)";

    const SQL_AVATAR_CHECK =
    "SELECT `userId` FROM `ressourcesUser`
    WHERE `userId`=?";

    const SQL_DASHBOARD =
     "SELECT U.`firstName`, U.`inscriptionDate`, RU.`url`, RU.`alt`
     FROM `user` as U
     INNER JOIN `password` as P on P.`userId`=U.`id`
     LEFT JOIN `ressourcesUser` as RU on RU.`userId`=U.`id`
     ORDER BY U.`id` DESC
     LIMIT 8";


  /**
   * [login Envoi une requête pour récupérer les informations utilisateurs correspondant à ce qui a été saisi dans le formulaire de connexion, si elles existent,]
   * @param  [array] $queryFields [e-mail inscrit dans le formulaire]
   * @return [array_assoc]              [Tableau associatif contenant les mails, passwords et niveau de droit de l'utilisateur].
   */
  public function login(array $queryFields)
  {
    $result = $this->database->queryOne(self::SQL, $queryFields);
    return($result);
  }

  public function updateSession(array $queryFields)
  {
    $result = $this->database->queryOne(self::SQL_UPDATE, $queryFields);
    return($result);
  }

  public function updateAvatar(array $queryFields)
  {

    $result = $this->database->queryOne(self::SQL_AVATAR_CHECK,[$queryFields['userId']]);
     if ($result)
     {
       $result=$this->database->executeSql(self::SQL_AVATAR_UPDATE,[$queryFields['alt'],$queryFields['url'],$queryFields['userId']]);
     }
     else
     {
       $result=$this->database->executeSql(self::SQL_AVATAR_INSERT,[$queryFields['alt'],$queryFields['url'],$queryFields['userId']]);
     }
    return($result);
  }

  public function getLastestUser()
  {
    $result = $this->database->query(self::SQL_DASHBOARD);
    return($result);
  }

}


 ?>
