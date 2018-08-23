<?php

    $id=abs((int)$_GET['del']);

    if($id) {
     $gbook->deleteLetter($id);
     header('Location: mybook.php');
     exit;
   } else {
    $errMessage="Что-то пошло не так!";
  }