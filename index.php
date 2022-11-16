<?php
require_once('user.class.php');

$user = new User('jkowalski', 'tajneHasło');
$user->register();
echo '<pre>';
var_dump($user);
?>