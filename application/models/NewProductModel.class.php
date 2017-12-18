<?php

  class NewProductModel extends AbstractModel
  {
    const SQL =
    "INSERT INTO `itemSold` (`type`, `name`, `description`, `alt`,  `salePrice`)
    VALUES (?,?,?,?,?)";

    const SQL_UPADATE_IMAGE=
    "UPDATE `itemSold`
     SET  `url`= ?
     WHERE `id`=?";

public function insert(array $queryFields)
{
  var_dump($queryFields);
  $result=$this->database->executeSql(self::SQL,$queryFields);
  return($result);
}

public function updateImage(array $inputFile)
{
    $extension = explode("/",$inputFile['type']);
    $extension=$extension[1];

    $name=$inputFile['id'].".".$extension;

    $baseUrl='/images/meal/';
    $url=$baseUrl.$name;

    $scan = scandir("application/www/images/meal");
    foreach($scan as $value)
    {
      if (preg_match("/^([0-9+])\./",$value,$return))
      {
        unlink("application/www/images/meal/$value");
        break;
      }
    }
    $target = (new Http)->moveUploadedFile('url',$baseUrl,$name);

    $newFile=['url'=>$baseUrl.$name,'id'=>$inputFile['id']];

    $result = $userModel->executeSql($inputFile);

}
  }

 ?>
