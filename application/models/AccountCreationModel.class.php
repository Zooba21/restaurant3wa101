<?php

Class AccountCreationModel extends AbstractModel
{
  const SQLUser = "INSERT INTO `user`(`name`, `firstName`, `mail`) VALUES(?,?,?)";

  const SQLPassword = "INSERT INTO `password`(`password`,`userId`) VALUES(?,?)";

  const SQLUserRessources = "INSERT INTO `userRessources`(`url`,`alt`,`userId`) VALUES(?,?,?)";

  public function createUser(array $queryFields)
  {
    $result = $this->database->executeSql(self::SQLUser, $queryFields);
    return($result);
  }

  public function createPassword(array $queryFields)
  {
    $result = $this->database->executeSql(self::SQLPassword, $queryFields);
    return($result);
  }

  public function createAvatar(array $queryFields, array $fileInput)
  {
    $result = $this->database->executeSql(self::SQLUserRessources, $queryFields);
    return($result);
  }
}

 ?>
