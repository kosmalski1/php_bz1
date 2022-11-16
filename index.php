<?php
require_once('user.class.php');

$user = new User('jkowalski', 'tajneHasło');
//$user->register();
if($user->login()) {
    echo "Zalogowano poprawnie";
} else {
    echo "Błędny login lub hasło";
}
?>