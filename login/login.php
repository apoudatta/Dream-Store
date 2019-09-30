<?php
@include ("../php/db-connect/connection.php");
//print"$data_message";

$email=$_POST["email"];
$password=$_POST["password"];

	if(isset($_POST['signin']))
	{
		if(!empty($email) && !empty($password))
		{
			$select_user=mysql_query("SELECT * from admin_information where Admin_Email='$email' and Admin_Password='$password'");
			$fetch_user=mysql_fetch_row($select_user);
		
			if($fetch_user[1]==$email && $fetch_user[2]==$password)
			{
			echo "<script>location='../php/admin-panel/admin-panel.php'</script>";	
			}
			else
			{
			echo "<script>alert('Your Email And Password Was Incorrect')</script>";
			}
		}
		else
		{
		echo "<script>alert('Please Fill Up Your Field')</script>";	
		}
	}
?>
<html>
	<head>
    	<title>login</title>
        	<link rel="stylesheet" href="login.css" type="text/css" />
    </head>
    
  <body>
   
    
  	<div class="main">
     	<div class="title">
        	<h1 class="DreamStore">LOGIN</h1>
            



            <div class="lgn_main">
                <form name="login" method="post" action="">
                    <span class="nmetext">
                        User Name
                    </span>
                     
                    <input type="text" name="email" placeholder="Enter Your Email" class="IP_box" />
                    
                    <span class="nmetext">
                        Password
                    </span>
                     
                    <input type="password" name="password" placeholder="Enter Your Password" class="IP_box" />
                    
                        <input type="submit" name="signin" value="Sign In" class="Sign_In" />
                </form>
            </div>
     </div>
        <div class="menu">

        	<ul>
            	<li><a href="../index.php"><img src="../image/icon1.jpg"></a></li>
                <li><a href="#"> ABOUT US</a></li>
                <li><a href="#">CONTACT US</a></li>
                <li><a href="#">FEEDBACK</a></li>
            </ul>
                <form id="serch" method="post" name="search" >
                     <input type="text" name="input" placeholder="Enter Your Keyword" class="input" >
                     <input type="submit" name="submit" value="GO" class="submit">
                 </form>
            
        </div>
       
        
        
  </div>  
   </body>
</html>
 