<?php 

$context = $_POST['item'] ;

file_put_contents("yokohama.csv", $context."\r\n", FILE_APPEND); 

?>