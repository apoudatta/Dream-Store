<?php
	$connect=mysql_connect("localhost","root","");
	$select=mysql_select_db("dreamstore");
	
	if(!$connect && !$select)
	{
		echo"<script>alert('Database Not Connected')</script>";	
	}
	else
	{
		//echo "Database Connected";
	}

?>