<?php
require_once('class/User.class.php');

$user = new User('jkowalski', 'tajneHasło');

echo '<pre>';
var_dump($user);
?>