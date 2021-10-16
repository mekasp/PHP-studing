<?php
$entityBody = file_get_contents('php://input');
echo $_SERVER['REQUEST_METHOD'];
var_dump($entityBody);

?>