<?php

  class NewProductModel extends AbstractModel
  {
    const SQL =
    "INSERT INTO `itemSold` (`itemType`, `name`, `description`, `alt`,  `salePrice`)
    VALUES (?,?,?,?,?)";

    const SQL_UPDATE_IMAGE=
    "UPDATE `itemSold`
     SET  `url`= ?
     WHERE `id`=?";

public function insert(array $queryFields)
{
  
  $result=$this->database->executeSql(self::SQL,$queryFields);
  return($result);
}

public function updateImage(array $inputFile)
{
    $extension = explode("/",$inputFile['type']);
    $extension=$extension[1];

    $name=$inputFile['id'].".".$extension;

    $baseUrl='/images/meals/';
    $url=$baseUrl.$name;

    $scan = scandir("application/www/images/meals");
    foreach($scan as $value)
    {
      if (preg_match("/^([0-9+])\./",$name,$return))
      {
        unlink("application/www/images/meals/$value");
        break;
      }
    }
    $target = (new Http)->moveUploadedFile('url',$baseUrl,$name);

    $newFile=[$baseUrl.$name,$inputFile['id']];

    $this->database->executeSql(self::SQL_UPDATE_IMAGE,$newFile);

}
  }

 ?>
