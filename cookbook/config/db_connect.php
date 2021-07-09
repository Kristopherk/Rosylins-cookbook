<?php
// connect to database

$conn = mysqli_connect('localhost', 'Kristopher', 'test1234', 'cookbook');

//check connection
if(!$conn){
   echo 'Connection error: ' . mysqli_connect_error();
}

?>



