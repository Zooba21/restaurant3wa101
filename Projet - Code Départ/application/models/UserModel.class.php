<?php

class UserModel extends AbstractModel
{
  const SQL = "SELECT `mail`, `password`, `rights`, `id` FROM `user` as U INNER JOIN `password` as P on P.user_id=U.id WHERE mail=? LIMIT 1";

  public function login($queryFields)
  {
    $values = [$queryFields[0]];
    return ($result = $this->database->queryOne(self::SQL, $values));
  }

}


 ?>
