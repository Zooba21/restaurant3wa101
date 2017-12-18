<?php

class ProduitController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $acces = new AccessModel(new Database);
    $acces->verifyAcces($http, $render, "Employed");
    return($render);
  }


  public function httpPostMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $acces = new AccessModel(new Database);
    $acces->verifyAcces($http, $render, "Employed");
    return($render);
    var_dump($queryFields);
    $product = new NewProductModel(new Database);

    $entry=
    [$queryFields['itemType'],$queryFields['name'],$queryFields['description'],$queryFields['alt'],$queryFields['salePrice']];
   $result = $product->insert($entry);
   $inputFile=$_FILES['url'];
   $inputFile['id']=$result;
   var_dump($inputFile);
   $product->updateImage($inputFile);
   return($render);
  }
}

 ?>
