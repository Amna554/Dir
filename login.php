<?php
session_start();
include "conn.php";
$error=array();
if(isset ($_POST['go'])){
if(isset ($_POST['email'])&& $_POST['email']!=''){
		$email=$_POST['email'];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			}
		else { 
		echo "invalid email";
		}
		 }
  else 
  {
    $error[]='email is missing';
  }
  //if(isset ($_POST['pass'])&& $_POST['pass']!=''){
		//$pass=$_POST['pass'];
		//$uppercase = preg_match('@[A-Z]@', $pass);
        //$lowercase = preg_match('@[a-z]@', $pass);
        //$number    = preg_match('@[0-9]@', $pass);
      //  $specialChars = preg_match('@[^\w]@', $pass);
    // if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
  //  echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
//}else{
  //  echo 'Strong password.';
//}
  //}else 
 // {
    //$error[]='password is missing';
  //}
//  }
if(isset ($_POST['pass'])&& $_POST['pass']!=''){
	$pass=$_POST['pass'];
    $enc = sha1($pass);
	//if (preg_match("/^[a-zA-Z ]*$/",$pass)&& trim ($pass)){}
	//else{$error[]="invalid pass";}
}
  else 
  {
    $error[]='pass is missing';
  }
if (isset($error) && count($error) == 0){
	$sql = "SELECT id, email,Password FROM login";
    $record = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_array($record)){
		 if($email==$row['email']&&$enc==$row['Password'])
	 {	
	 $_SESSION['login']=1;
if($_SESSION['login']==1){	  
	 header('Location:record.php');}
else{header('Location:login.php');}
	 }	 	 
	 }
}
else
{
foreach ($error as $value){
	echo $value;
	echo'<br>';
}
}
}	
?>

<html>
<head>
<title> Login Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="frm">
<form action="" method="POST">
<p>
<label>Email:</label>
<input type="text" id="user" name="email">
</p>
<p>
<label>Password:</label>
<input type="password"  id="pass" name="pass"/>
</p>
<p>

<input type="submit" id="btn" name="go">
</p>
</form>
</div>
</body>
</html>