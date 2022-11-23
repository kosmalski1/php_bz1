<?php
$test = 1235432;
echo "chuj";
$db = new mysqli('localhost','root','','baza_danych');
$id=1;
$q = $db->prepare("SELECT * FROM test WHERE id = ?");
$q->bind_param('i', $id);
if($q->execute()){
    $result = $q->get_result();
$row = $result->fetch_assoc();
}
?>