<?php

class UpdateUserModel extends AbstractModel
{
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

  public function updateAvatar(array $inputFile)
  {
      $extension = explode("/",$inputFile['type']);
      $extension=$extension[1];

      $name=$inputFile['id'].".".$extension;

      $baseUrl='/images/user/';
      $url=$baseUrl.$name;
      $alt=$_SESSION['user']['name']." ".$_SESSION['user']['firstName']." "."Avatar";

      $scan = scandir("application/www/images/user");
      var_dump($scan);
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
      var_dump($newFile);
      $userModel->updateAvatar($newFile);
  }

}


 ?>
