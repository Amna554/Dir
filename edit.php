<?php
include "conn.php";
   
   $id = $_GET['id'];
   $m=mysqli_query($conn,"SELECT * FROM Directory WHERE id='$id'");
   $check=mysqli_fetch_array($m);

$error=array();
if(isset ($_POST['save'])){
if(isset ($_POST['name'])&& $_POST['name']!=''){
	$name=$_POST['name'];
	if (preg_match("/^[a-zA-Z ]*$/",$name)&& trim ($name)){}
	else{$error[]="invalid name";}
}
  else 
  {
    $error[]='name is missing';
  }
if(isset ($_POST['last_name'])&& $_POST['last_name']!=''){
	$last_name = $_POST['last_name'];
	if (preg_match("/^[a-zA-Z ]*$/",$last_name)&& trim ($last_name)){}
	else{echo"invalid last name";}
}
  else 
  {
    $error[]='last name is missing';
  }
if(isset ($_POST['email'])&& $_POST['email']!=''){
		$email=$_POST['email'];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)&& trim ($email)){
			
		}
		else { 
		echo "invalid email";
		}
		
  }
  else 
  {
    $error[]='email is missing';
  }
  if(isset ($_POST['num'])&& $_POST['num']!=''){
		$num=$_POST['num'];
		if( preg_match('@[0-9]@',$num)&&strlen($num)==11) 
		{}
	else{
    $error[]='invalid number';
	}
}
  else 
  {
    $error[]='number is missing';
  }


if (isset($error) && count($error) == 0){
	$edit = mysqli_query($conn,"UPDATE `Directory` SET `Id`='$id',`Name`='$name',`Last_Name`='$last_name',`Email`='$email',`Mobile`='$num' WHERE id='$id'");  
       if(!$edit)	   
    {
	 echo  mysqli_error($conn);
	} 
   else
   { 
     header('Location: record.php');    
   }

}else
{
foreach ($error as $value){
	echo $value;
	echo'<br>';
                         
}
 
}   }
?>
<html>
<head>

<link  rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div >
<form  class="form" method ="post">
<p>
<label> Name     </label>
    <input type="text" name="name" style="margin-left: 120px;"  value="<?php echo $check['Name'];?>"/> 
</p>
<p>
 <label>Last Name</label>
 <input type="text" name="last_name" style="margin-left: 60px;"value="<?php echo $check['Last_Name'];?>" /> 
</p>
 <p>
 <label>Email</label>
 <input type="text" name="email" style="margin-left: 120px;" value="<?php echo $check['Email'];?>" />
 </p>
 <p>
 <label>Mobile Number</label>
 <input type='tel' pattern='\[\3]\d{2}\d{7}'title='Phone Number (Format: 03029999999)' value="12312312123" name="num"value="<?php echo $check['Mobile'];?>"  />
 </p>
 <p>
 <input type="submit" name="save" id="btn"/>
</p>
</form>
</div>

</body>
</html>

