<?php
include("../../db-connect/connection.php");
//print"$data_message";

$Full_name=$_POST["Full_name"];
$Account_Title=$_POST["Account_Title"];
$Account_Number=$_POST["Account_Number"];
$Password=$_POST["Password"];
$Amount=$_POST["Amount"];

//.........................................................ADD............................................................
if(isset($_POST["Add"]))
{
	if(!empty($Full_name) && !empty($Account_Title) && !empty($Account_Number) && !empty($Password) && !empty($Amount))
	{
		mysql_query("insert into credit_card (`Full_name`,`Account_Title`,`Account_Number`,`Password`,`Amount`)values ('$Full_name','$Account_Title','$Account_Number','$Password','$Amount')");
		if(mysql_affected_rows()>0)
		{
			$image_uplode="../../../Credit_image/$Account_Number.jpg";
			//print"$image_uplode";
			move_uploaded_file($_FILES['Image_field']['tmp_name'],$image_uplode);
			$message="<span style='color:#ffffff; font-size:22px;'>Data Insert Successfully</span>";	
		}
		else
		{
			$message="<span style='color:#ffffff; font-size:22px;'>Data Insert Unsuccessfully</span>";
		}
	}
	else
	{
	$message="<span style='color:#ffffff; font-size:22px;'>Fill all box</span>";	
	}	
}
//.............................................................EDIT...........................................................
if(isset($_POST["Edit"]))
{
	if(!empty($Full_name) && !empty($Account_Title) && !empty($Account_Number) && !empty($Password) && !empty($Amount))
	{
		mysql_query("replace into credit_card (`Full_name`,`Account_Title`,`Account_Number`,`Password`,`Amount`)values ('$Full_name','$Account_Title','$Account_Number','$Password','$Amount')");
		if(mysql_affected_rows()>0)
		{
			$image_uplode="../../../Credit_image/$Account_Number.jpg";
			//print"$image_uplode";
			move_uploaded_file($_FILES['Image_field']['tmp_name'],$image_uplode);
			$message="<span style='color:#ffffff; font-size:22px;'>Data Edit Successfully</span>";	
		}
		else
		{
			$message="<span style='color:#ffffff; font-size:22px;'>Data Edit Unsuccessfully</span>";
		}
	}
	else
	{
	$message="<span style='color:#ffffff; font-size:22px;'>Fill all box</span>";	
	}	
}
//.............................................................DELETE...........................................................
if(isset($_POST["DELETE"]))
{
	mysql_query("delete from credit_card WHERE Account_Number='$Account_Number'");
	if(mysql_affected_rows()>0)
	{
		unlink("../../../Credit_image/$Account_Number.jpg");
		$message="<span style='color:#ffffff; font-size:22px;'>Data DELETE Successfully</span>";	
	}
	else
	{
		$message="<span style='color:#ffffff; font-size:22px;'>Data DELETE Unsuccessfully</span>";
	}
}
//........................................................ SEARCH ......................................................//
if(isset($_POST["scr_button"]))
	{
		$textserch=$_POST["txt_search"];
		$search_query=mysql_query("select * from credit_card where Account_Number='$textserch'");
		$fetch=mysql_fetch_row ($search_query);
		//print_r("$fetch");
	}
//..................................................VIEW...........................................................
if(isset($_POST["View"]))
	{
		$select_info=mysql_query("select * from credit_card");
		$total_field=mysql_num_fields($select_info);
		//print "$total_field";
		$table="<table width='500px' align='center'>";
			$table.="<tr class='view_table_tr' align='center'>";
				$table.="<td>Full name</td>";
				$table.="<td>Account Title</td>";
				$table.="<td>Account Number</td>";
				$table.="<td>Password</td>";
				$table.="<td>Amount</td>";
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
	<title>creadit card</title>
    <style type="text/css">
	.header{color:#000000;font-size:30px; font-family:"comic Sans MS"; font-style:italic; text-shadow:#FFF 2px 2px 2px }
	.txt_search{ height:30PX; width:250PX; border:1px #FFF solid;  background-color:inherit; font-size:18px; font-family:"comic Sans MS"; font-style:italic;}
	.scr_button{ height:30px; width:100px; border:1px #FFF solid; background-color:#000000; color:#FFFFFF;font-size:18px;font-family:"comic Sans MS";}
	.text{ font-size:22px; font-family:"comic Sans MS"; font-style:italic; color:#000000; letter-spacing:1px;}
	.txtbox{ height:30PX; width:300PX; border:1px #FFF solid; background-color:inherit; font-size:19px; font-family:"comic Sans MS"; font-style:italic; padding-left:20px; padding-bottom:3px;}
	.Image_field{ background-color: #000000;color: #ffffff;font-family: "comic Sans MS";font-size:18px;font-style:italic;height:28px;width: 242px;}
	.button{ height:30px; width:90px; border:1px #FFF solid; background-color:#000000; color:#FFFFFF; margin-left:20px; font-size:20px;font-family:"comic Sans MS"; font-style:italic; padding-top:0px;}
	.button:hover{ background-color:#FFFFFF; color:#000; border:1px #000 solid;}
	</style>
</head>
<body>
<table width="700" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
      <table width="626" height="460" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="header">
          <th height="74" colspan="2">CREDIT CARD</th>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="text" name="txt_search" class="txt_search"/>
            <input type="submit" name="scr_button" value="SEARCH" class="scr_button"/></td>
        </tr>
        <tr>
          <td width="226" align="center" class="text">Full name </td>
          <td width="400"><input type="text" name="Full_name" class="txtbox"  value="<?php print $fetch[0] ?>"/></td>
        </tr>
        <tr>
          <td align="center" class="text">Account Title</td>
          <td><input type="text" name="Account_Title" class="txtbox"  value="<?php print $fetch[1] ?>"/></td>
        </tr>
        <tr>
          <td align="center" class="text">Account Number </td>
          <td><input type="text" name="Account_Number" class="txtbox"  value="<?php print $fetch[2] ?>"/></td>
        </tr>
        <tr>
          <td align="center" class="text">Password</td>
          <td><input type="password" name="Password" class="txtbox"  value="<?php print $fetch[3] ?>"/></td>
        </tr>
        <tr>
          <td align="center" class="text">Amount</td>
          <td><input type="text" name="Amount" class="txtbox"  value="<?php print $fetch[4] ?>"/></td>
        </tr>
        <tr>
          <td align="center" class="text">Picture</td>
          <td><input name="Image_field" type="file" class="Image_field"/></td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="Add" value="ADD" class="button"/>
            <input type="submit" name="Edit" value="EDIT" class="button"/>
            <input type="submit" name="DELETE" value="DELETE" class="button" />
            <input type="submit" name="View" value="VIEW" class="button"/>
            <input type="submit" name="Submit6" value="CANCEL" class="button"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><?php print $message ?><?php echo "$table"; ?></td>
        </tr>
      </table>
    </form></th>
  </tr>
</table>
</body>
</html>