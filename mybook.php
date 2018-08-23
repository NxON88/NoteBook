<?php

include "mybook.class.php";

$gbook=new mybook();

$errMessage="";

if($_SERVER["REQUEST_METHOD"]=="POST") {
    include "saveletter.inc.php";
}

if(isset($_GET['del'])) {
    include "deleteletter.inc.php";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Записная книга</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section id="content" class="container">
            		
                    <?php
                        include "showletter.inc.php";
                    ?>
                   <h2>Добавить запись</h2>
                   <?php
                
                    if($errMessage) {
                        echo "<p>".$errMessage;
                    }   
                    ?>
		  <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<table>
			<tbody><tr><td><p>Заголовок</p></td><td><input type="text" name="gname"></td>
	      	</tr><tr>
		    <td><p>Новая запись</p></td>
			<td>
		      <textarea name="letter" cols="40" rows="4"></textarea></td>
			</tr>
			
			<tr><td> </td><td>
			  <input class = "formBtn" type="submit" name="Submit" value="Добавить запись"></td>
			</tr>
			</tbody></table>
		  </form>
                  
        </section>
    </body>
</html>