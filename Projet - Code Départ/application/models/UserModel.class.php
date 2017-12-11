<?php

class UserModel extends AbstractModel
{
  const SQL = "SELECT `mail` FROM `users` as U INNER JOIN `password` as P on P.user_id=U.id WHERE mail=? LIMIT 1";

  public function login($queryFields)
  {
    $values = [$queryFields['mail']];
    $result = $this->databse->queryOne($sql, array $values);
    var_dump($result);
    return($result);
  }

}


 ?>
