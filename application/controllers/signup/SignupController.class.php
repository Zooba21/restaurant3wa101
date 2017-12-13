<?php

  class SignupController
  {
    public function httpPostMethod(Http $http, array $queryFields)
    {
      var_dump($queryFields);
        $signUp = new UserModel(new Database);

        $userForm = [
          $queryFields['name'],
          $queryFields['firstName'],
          $queryFields['adress'],
          $queryFields['adress2'],
          $queryFields['postCode'],
          $queryFields['city'],
          $queryFields['phone'],
          $queryFields['mail']
        ];
        $lastId = $signUp->executeSql($queryFields);

        if (!empty($_FILES))
        {
          $fileInput=$_FILES['avatar'];
          $typeFile=explode("/",$fileInput['type']);
          $typeFile=$typeFile[1];
          $name="avatar"."$lastId"."$type";
          var_dump($typeFile);
        }
        else
        {

        }

      //  $lastId = $signUp->executeSql($userForm);

        $passwordForm= [
        $queryFields['password'],
        $lastId
        ];

      //  $signeUp->executeSql($passwordForm);
    }

    public function httpGetMethod()
    {

    }
  }

 ?>
