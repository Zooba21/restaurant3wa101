<?php

class UserModel extends AbstractModel
{
  const SQL = "SELECT `mail`, `password`, `rights` FROM `user` as U INNER JOIN `password` as P on P.user_id=U.id WHERE mail=? LIMIT 1";

  public function login($queryFields)
  {
    $values = [$queryFields[0]];
    $result = $this->database->queryOne(self::SQL, $values);
    return($result);
  }

}


 ?>
