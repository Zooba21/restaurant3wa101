<?php

class ProduitController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $acces = new AccessModel(new Database);
    $acces->verifyAcces($http, $render, "Employed");
  }


  public function httpPostMethod(Http $http, array $queryFields)
  {
    // var_dump($queryFields);
    $product = new NewProductModel(new Database);

    $entry=
    [$queryFields['type'],$queryFields['name'],$queryFields['description'],$queryFields['alt'],$queryFields['salePrice']];
   $result = $product->insert($entry);
   $inputFile=$_POST;
  //  $inputFile['id']=$result;
  //  $product->updateImage($inputFile);
  //  var_dump($result);
    var_dump($_FILES);
    // return($render);
  }
}

 ?>
