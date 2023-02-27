<?php 
  $server ="   ";
  $username =" ";
  $password ="  ";
  $dbname=" ";
$conn = new mysqli('localhost','root','','usersform1');
if(!$conn.mysqli_connect_error())
{
    echo "Connection Denied";
}


?>