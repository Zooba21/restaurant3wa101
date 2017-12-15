<?php

class UpdateUserModel extends AbstractModel
{

  const SQL_VERIF_PASSWORD =
  "SELECT `password` FROM `password` WHERE `userId`=? AND `password`=?";

  const SQL_UPDATE_PASSWORD =
  "UPDATE `password` SET `password`=? WHERE `userId`=?";

  /**
   * Méthode permettant la mise à jour des informations utilisateurs. Une fois la requête exécutée.
   * @param [type] $queryFields [description]
   */
  public function UpdateUser($queryFields)
  {
    $sqlString="UPDATE `user` SET ";
    $values = [];
    $limit = count($queryFields);
    $x=0;
    foreach($queryFields as $key=>$value)
    {
      $sqlString.="`$key`=?";
      array_push($values,$value);
      $x++;
      if ($limit > $x)
      {
        $sqlString.=",";
      }
      else {
        $sqlString.=" ";
      }
    }
    $sqlString.="WHERE `id`=?";
    array_push($values,$_SESSION['user']['id']);
    $result= $this->database->executeSql($sqlString,$values);
  }

/**
 * Méthode permettant la mise à jour de l'avatar de l'utilisateur. Le procédé va construire le chemin du nouvel avatar, son nom et exécuter la méthode updateAvatar du UserModel Class.
 * @param  array  $inputFile [contenu du $_FILES]
 * @return [type]            [description]
 */
  public function updateAvatar(array $inputFile)
  {
      $extension = explode("/",$inputFile['type']);
      $extension=$extension[1];

      $name=$inputFile['id'].".".$extension;

      $baseUrl='/images/user/';
      $url=$baseUrl.$name;
      $alt=$_SESSION['user']['name']." ".$_SESSION['user']['firstName']." "."Avatar";

      $scan = scandir("application/www/images/user");
      foreach($scan as $value)
      {
        if (preg_match("/^([0-9+])\./",$value,$return))
        {
          unlink("application/www/images/user/$value");
          break;
        }
      }
      $target = (new Http)->moveUploadedFile('avatar',$baseUrl,$name);

      $userModel = (new UserModel(new Database));
      $newFile=['url'=>$baseUrl.$name,'alt'=>$alt,'userId'=>$inputFile['id']];

      $result = $userModel->updateAvatar($newFile);


  }

public function updatePassword(array $queryFields)
{

  $result = $this->database->queryOne(self::SQL_VERIF_PASSWORD,[$queryFields['id'],$queryFields['oldPassword']]);
  if ($result['password']==$queryFields['oldPassword'])
  {
    $result = $this->database->executeSql(self::SQL_UPDATE_PASSWORD,[$queryFields['password'],$queryFields['id']]);
  }
  return $result;

}

}


 ?>
