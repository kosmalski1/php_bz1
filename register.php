<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
</head>
<body>
    <form action="" method="post">
        <label for="loginID">Login:</label><br>
        <input type="text" name="login" id="loginID"><br>
        <label for="passwordID">Hasło:</label><br>
        <input type="password" name="password" id="passwordID"><br>
        <label for="firstnameID">Imię:</label><br>
        <input type="text" name="firstname" id="firstnameID"><br>
        <label for="lastnameID">Nazwisko:</label><br>
        <input type="text" name="lastname" id="lastnameID"><br>
        <input type="submit" value="Rejestruj">
    </form>
<?php
if(isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
    require_once('config.php');
    require_once('user.class.php');
    $user = new User($_REQUEST['login'], $_REQUEST['password']);
    $user->setfirstname($_REQUEST['firstname']);
    $user->setlastname($_REQUEST['lastname']);
    if($user->register()) {
        echo "Zarejestrowano poprawnie";
    } else {
        echo "Błąd rejestracji użytkownika";
    }
}
?>    
</body>
</html>