<?php

class AccessModel
{
  public function verifyAcces()
  {
    $flashbag = new FlashBag;
  if (isset($render['user']))
  {
    if ($render['user']['rights'] != 'Employed')
    {
      $flashbag->add("accès refusé");
      return('')
    }
  }
  else
  {
    $flashbag->add("accès refusé");
    return('');
  }
}

}

 ?>
