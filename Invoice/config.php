<?php
  error_reporting(E_ERROR | E_PARSE);
$server="localhost";
$username="root";
$password="";
$database="invoice";
$conn=new mysqli($server,$username,$password,$database);
if($conn){
    // echo "successfull";
}
else{
    echo "not successfull"; 
}
?>
 