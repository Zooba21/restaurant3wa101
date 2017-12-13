<?php

Class AccountCreationModel extends AbstractModel
{
  const SQLUser = "INSERT INTO `user`(`name`, `firstName`, `mail`) VALUES(?,?,?)";

  const SQLPassword = "INSERT INTO `password`(`password`,`userId`) VALUES(?,?)";

  const SQLUserRessources = "INSERT INTO `userRessources`(`url`,`alt`,`userId`) VALUES(?,?,?)";

  public function createUser(array $queryFields)
  {
    var_dump($queryFields);
    $result = $this->database->executeSql(self::SQLUser, $queryFields);
    var_dump($result);
    return($result);
  }

  public function createPassword(array $queryFields)
  {
    var_dump($queryFields);
    $result = $this->database->executeSql(self::SQLPassword, $queryFields);
    var_dump($result);
    return($result);
  }

  public function createAvatar(array $queryFields, array $fileInput)
  {
    var_dump($queryFields);
    //    $result = $this->database->executeSql(self::SQLUserRessources, $queryFields);
    //    var_dump($result);
    return($result);
  }
}

 ?>
