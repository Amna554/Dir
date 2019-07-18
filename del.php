<?php
include "conn.php";
session_start();
if(!isset($_SESSION['login'])){
	header('Location:login.php');
}

  $id = $_GET['del'];

  $sql = "DELETE FROM Directory WHERE id='$id'";
   if (mysqli_query($conn, $sql)) 
   {
     echo "Record deleted successfully";
   }
   else 
   {
     echo "Error deleting record: " . mysqli_error($conn);
   }
      
	  header('Location:record.php');
?>	   
	   
 