<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dominik Ryńko">
    <link href="style.css" rel="stylesheet">
    <title>Captcha - demo</title>
</head>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="POST">
    <dl>
        <dt><label for="security_code"><img src="create.php"></label></dt>
         <dd><input type="text" id="security_code" name="security_code" placeholder="Kod z obrazka"></dd>
        <dt><input type="submit" value="Wyślij" name="send"></dt>
    </dl>
</form>

<?php
if(isset($_POST['send']))
{
 if($_SESSION['security_code'] == $_POST['security_code'])
  echo '<p>Kod się zgadza</p>';
 else
  echo '<p>Kod sie nie zgadza</p>';
}

?>
</body>
</html>


