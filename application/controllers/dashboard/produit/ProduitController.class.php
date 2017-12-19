<?php

class ProduitController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $acces = new AccessModel(new Database);
    $acces->verifyAcces($http, $render, "Employed");
    $render['flashbag']= new FlashBag;

    $itemsList = new ItemSoldModel(new Database);
    $enumList = ['entrée','plat','dessert','boisson'];
    foreach($enumList as $value)
    {
      $render['menu'][$value]=$itemsList->getMeal([$value]);
    }

    return($render);
  }


  public function httpPostMethod(Http $http, array $queryFields)
  {
    $render = (new UserSession)->getAll();
    $acces = new AccessModel(new Database);
    $acces->verifyAcces($http, $render, "Employed");
    $flashbag = new FlashBag;

    $product = new NewProductModel(new Database);

    if ($_FILES['url']['error'] != 0)
    {
      $flashbag->add("Erreur lors de l'importation du fichier, veuillez réessayer").
      $http->redirectTo('dashboard/produit');
    }
    else
    {
      if ($queryFields['itemType'] != "------")
      {
        $entry=
         [$queryFields['itemType'],$queryFields['name'],$queryFields['description'],$queryFields['alt'],$queryFields['salePrice']];
        $result = $product->insert($entry);
        $inputFile=$_FILES['url'];
        $inputFile['id']=$result;

        $product->updateImage($inputFile);
      }
      else
      {
        $flashbag->add("Veuillez saisir une catégorie valide");
        $http->redirectTo('dashboard/produit');
      }

    }

    $itemsList = new ItemSoldModel(new Database);
    $enumList = ['entrée','plat','dessert','boisson'];
    foreach($enumList as $value)
    {
      $render['menu'][$value]=$itemsList->getMeal([$value]);
    }
   return($render);
  }
}

 ?>
