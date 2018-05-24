<!--<!DOCTYPE html>

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
    </body>
</html>-->
<?php
  // Include PHP files using require_once
  // to avoid multiple inclusions
  require_once 'config/Conf.php';

  // Display database login
  echo Conf::getLogin();
?>

