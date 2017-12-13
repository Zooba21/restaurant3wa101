<?php

Class AccountCreationModel
{
  const SQLUser = "INSERT INTO `user`(`name`, `firstName`, `address`, `address2`, `postCode`, `city`, `phone`, `mail`) VALUES=(?,?,?,?,?,?,?,?)";

  const SQLPassword = "INSERT INTO `password`(`password`,`userId`) VALUES=?,?";

  const SQLUserRessources "INSERT INTO `userRessources`(`url`,`alt`,`userId`) VALUES=?,?,?";

  function public createUser(array $queryFields)
  {
    var_dump($queryFields);
//    $result = $this->database->executeSql(self::SQLUser, $queryFields);
//    var_dump($result);
    return($result);
  }

  function public createPassword(array $queryFields)
  {
    var_dump($queryFields),
    //    $result = $this->database->executeSql(self::SQLPassword, $queryFields);
    //    var_dump($result);
    return($result);
  }

  function public createAvatar(array $queryFields, array $fileInput)
  {
    var_dump($queryFields),
    //    $result = $this->database->executeSql(self::SQLUserRessources, $queryFields);
    //    var_dump($result);
    return($result);
  }
}

 ?>
