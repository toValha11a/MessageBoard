<?php
require 'vendor/autoload.php';

use Poc\Classes\Circle;
$mysqli = new mysqli("localhost", "root", "", "practicebase" );
?>

<html>
<div class="inputFields">
<form action="index.php" method='POST'>
    <div class="nameInput">
        <input class="nameEntryField" placeholder="Имя" type='text' id='username' name='username'><br>
    </div>

    <textarea class="textInput" placeholder="Текст" id='message' name='message'></textarea><br>

    <div class="saveButtonField">
       <input class="saveButton" type="submit" value='Сохранить'>
   </div>
</form>
</div>

<pre>
<?php
['username' => $name, 'message' => $text] = $_POST;
$sql = "INSERT INTO messages (NAME, MESSAGES) VALUES ('$name', '$text')";
$result = $mysqli->query($sql);
print_r($result);
?>
</pre>
</html>
<style>

 .inputFields{
     margin-left: 800px;
     margin-top: 600px;
 }

  .nameInput{
      margin-bottom: 10px;

  }
  .nameEntryField{
     width: 500px;
     text-align: center;
 }

   .textInput{
       width: 500px;
       height: 200px;
       text-align: center;
       font-size: 32px;
       font-weight: bold;
   }

   .saveButtonField{
       margin-left: 200px;
       margin-top: 10px;
   }
   .saveButton{
        background: white;
   }

</style>
