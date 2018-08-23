<?php

    function clearDate($date) {
     $date=stripslashes($date);
     $date=strip_tags($date);
     $date=trim($date);
     return $date;
}

    $gname=clearDate($_POST['gname']);
    $letter=clearDate($_POST['letter']);
     if(!empty($gname) && !empty($letter)) {
     if($gbook->saveLetter($gname, $letter)){
        header('Location: mybook.php');
     } else {
        $errMessage="Произошла ошибка при добавлении сообщения";
     }
  } else {
    $errMessage="Заполните все поля формы!";
}