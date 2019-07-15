<?php
 include "conn.php";
?>
  <html>
<title> Mobile Phone Directory</title>
    <head>
      <br><h1 style="float:right ; margin-right:44%"> Mobile Phone Directory</h1><br>
	  <link rel="stylesheet" type="text/css" href="style.css">
    </head>

   <body><br><br><br><br>
       <button type="submit" onclick ="window.location.href = 'index.php'" style="float:right ; margin-right:27%">Add New</button><br>

      <table>
         <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
	        <th>Edit</th>
			<th>Delete</th>
         </tr>

<?php

   $sql = "SELECT Id, Name,Last_Name, Email,Mobile FROM Directory";
     $record = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($record))
     
	 {?>
        <tr>	   
             <td><?php echo $row['Id'];?></td>
	         <td><?php echo $row['Name'];?></td>
             <td> <?php echo $row['Last_Name'];?></td>
             <td> <?php echo $row['Email'];?></td>
             <td> <?php echo $row['Mobile'];?></td>
             <td> 
	             <button><a href="edit.php?id=<?php echo $row['Id'];?>">Edit</a></button>
   	         </td>
             <td> 
	           <button>  <a href="del.php?del=<?php echo $row['Id'];?>">Delete</a></button>
   	         </td>
	     </tr>
<?php
     }?>
      </table>
   </body>
</html>