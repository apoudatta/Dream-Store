<?php 
include("../../db-connect/connection.php");       
//print"$data_message";

	$Admin_Name=$_POST["Admin_Name"];
	$Admin_Email=$_POST["Admin_Email"];
	$Admin_Password=$_POST["Admin_Password"];
//........................................................ ADD ......................................................//
if(isset($_POST["ADD"]))
	{
		if(!empty($_POST["Admin_Name"]) && !empty($_POST["Admin_Email"]) && !empty($_POST["Admin_Password"]))
			{
				mysql_query("insert into admin_information(`Admin_Name`,`Admin_Email`,`Admin_Password`) VALUES('$Admin_Name','$Admin_Email','$Admin_Password')");
				if(mysql_affected_rows()>0)
					{
						$image_uplode="../../../admin_image/$Admin_Email.jpg";
						//print"$image_uplode";
						 move_uploaded_file($_FILES['image_file']['tmp_name'],$image_uplode);
						$message="<span style='color:#ffffff; font-size:22px;'>Data Insert Successfully</span>";	
					}
					else
					{
						$message="<span style='color:#ffffff; font-size:22px;'>Data Insert Unsuccessfully</span>";
					}
			}
			else
			{
				$message="<span style='color:#ffffff; font-size:22px;'>Please fill up the field</span>";
			}
	}
//........................................................ EDIT ......................................................//
if(isset($_POST["EDIT"]))
	{
		mysql_query("replace into admin_information(`Admin_Name`,`Admin_Email`,`Admin_Password`) VALUES('$Admin_Name','$Admin_Email','$Admin_Password')");

			if(mysql_affected_rows()>0)
			{
				 $image_uplode="../../../admin_image/$Admin_Email.jpg";
				 //print "$image_uplode";
				 move_uploaded_file($_FILES['image_file']['tmp_name'],$image_uplode);
				$message="<span style='color:#ffffff; font-size:22px;'>Data Edit Successfully</span>";	
			}
			else
			{
				$message="<span style='color:#ffffff; font-size:22px;'>Data Edit Unsuccessfully</span>";	
			}
	}
//........................................................ DELETE ......................................................//
if(isset($_POST["DELETE"]))
	{
		mysql_query("delete from admin_information where Admin_Email='$Admin_Email'");
		if(mysql_affected_rows()>0)
		{
			unlink("../../../admin_image/".$_POST["Admin_Email"].".jpg");
			$message="<span style='color:#ffffff; font-size:22px;'>Data delete Successfully</span>";
		}
		else
		{
			$message="<span style='color:#ffffff; font-size:22px;'>Data delete Unsuccessfully</span>";
		}
	}
//........................................................ SEARCH ......................................................//
	
if(isset($_POST["SubmitSearch"]))
	{
		$textserch=$_POST["textserch"];
		$search_query=mysql_query("select * from admin_information where Admin_Email='$textserch'");
		$fetch=mysql_fetch_row ($search_query);
		//print_r("$fetch");
	}
//..................................................VIEW...........................................................
if(isset($_POST["VIEW"]))
	{
		$select_info=mysql_query("select Admin_Name,Admin_Email,Admin_Password from admin_information");
		$total_field=mysql_num_fields($select_info);
		//print "$total_field";
		$table="<table width='500px' align='center'>";
			$table.="<tr class='view_table_tr' align='center'>";
				$table.="<td>Admin Name</td>";
				$table.="<td>Admin Email</td>";
				$table.="<td>Admin Pssword</td>";
				$table.="<td>Admin Picture</td>";
			$table.="</tr>";
			
			while($fatch_info=mysql_fetch_array($select_info))
			{
				$table.="<tr>";
					for($b=0;$b<$total_field;$b++)
					{
						$table.="<td align='center'>$fatch_info[$b]</td>";	
					}
					$table.="<td><img src='../../../admin_image/$fatch_info[1].jpg' height='80px' width='100px'</td>";
				$table.="</tr>";
			}
		$table.="</table>";
	}
?>

<html>
	<head>
		<title>Admin Information</title>
	<style type="text/css">
		.header{ color:#000000;font-size:26px; font-family:"comic Sans MS"; font-style:italic; text-shadow:#FFF 2px 2px 2px }
		.Submit{ height:34px; width:100px; border:0px; background-color:#000000; color:#FFFFFF; margin-left:35px; font-size:24px;font-family:"comic Sans MS"; font-style:italic; padding-top:0px;}
		.Submit:hover{ background-color:#1E1E1E; cursor:pointer;}
		.TEXTINPUT{ height:30PX; width:300PX; margin-left:2PX; border:0px; font-size:19px; font-family:"comic Sans MS"; font-style:italic; padding-left:20px; padding-bottom:3px;}
		.NAME{ font-size:22px; font-family:"comic Sans MS"; font-style:italic; color:#000000; letter-spacing:1px; padding-left:16px;}
		.imgbotton{ background-color: #000000; border: 0px none; color: #ffffff;font-family: "comic Sans MS";font-size:18px;font-style:italic;height: 28px;margin-left: -17px; width: 242px;}
		.view_table_tr{ height="40px"; align="center"; font-size:18px; color:#FFF; border-bottom:5px #FFFFFF solid; background:#000;}
	</style>
	</head>
    
<body>
	<form id="form" name="form" method="post" action="" enctype="multipart/form-data">
    <table width="588" height="317" border="0px;" align="center" cellpadding="0" cellspacing="0">
        <tr class="header">
        	<th height="45" colspan="2" valign="middle" ><h1>Admin Information</h1></th>
        </tr>
        <tr>
            <td height="37" colspan="2" align="right">
                <input type="text" name="textserch" class="TEXTINPUT" />
                <input type="submit" name="SubmitSearch" value="Search" class="Submit"/>
            </td>
        </tr>
        <tr >
            <td width="241" height="40" align="center" class="NAME">Admin Name </td>
            <td width="341">
            	<input type="text" name="Admin_Name" class="TEXTINPUT" id="Admin_Name" value="<?php print $fetch[0] ?>" />
            </td>
        </tr>
        <tr>
            <td height="46" align="center"class="NAME">Admin Email</td>
            <td>
            	<input type="text" name="Admin_Email" class="TEXTINPUT" id="Admin_Email" value="<?php print $fetch[1] ?>"/>
            </td>
        </tr>
        <tr>
            <td height="41" align="center"class="NAME">Admin Password</td>
            <td>
                <input type="password" name="Admin_Password" class="TEXTINPUT" id="Admin_Password" value="<?php print $fetch[2] ?>" />
            </td>
        </tr>
        <tr align="center">
            <td height="37" class="NAME">Admin Image</td>
            <td>
            	<input type="file" name="image_file"  class="imgbotton">
            </td>
        </tr>
        <tr>
            <td height="46" colspan="2">
                <input type="submit" name="ADD" value="ADD" class="Submit"/>
                <input type="submit" name="EDIT" value="EDIT" class="Submit"/>
                <input type="submit" name="VIEW" value="VIEW" class="Submit"/>
                <input type="submit" name="DELETE" value="DELETE" class="Submit"/>
            </td>
        </tr>
        <tr>
        	<td height="25px" colspan="3" align="center"><?php print $message ?><?php echo "$table"; ?></td>
        </tr>
	</table>
	</form>
</body>
</html>
