<?php

class UserModel extends AbstractModel
{
  /**
   * [SQL String correspondant à la chaîne de caractère permettant de récupérer une adresse e-mail correspondant à ce qui a été inscrit dans le formulaire de connexion]
   * @var string
   */
  const SQL = "SELECT `mail`, `password`, `rights`, `id` FROM `user` as U INNER JOIN `password` as P on P.user_id=U.id WHERE mail=? LIMIT 1";
  /**
   * [login Envoi une requête pour récupérer les informations utilisateurs correspondant à ce qui a été saisi dans le formulaire de connexion, si elles existent,]
   * @param  [array] $queryFields [e-mail inscrit dans le formulaire]
   * @return [array_assoc]              [Tableau associatif contenant les mails, passwords et niveau de droit de l'utilisateur].
   */
  public function login(array $queryFields)
  {
    $values = [$queryFields[0]];
    return ($result = $this->database->queryOne(self::SQL, $values));
  }

}


 ?>
