<?php

if (isset($_GET['name'])){

$file = 'people.txt';

$current = $_GET['name'];

file_put_contents($file, $current);	

}

?>



