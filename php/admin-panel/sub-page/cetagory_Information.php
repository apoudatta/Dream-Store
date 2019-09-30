<?php
include ("../../db-connect/connection.php");
//print "Database connected";
//........................................................................................................................//
	function makeID($table,$field,$prefix,$idLength)
	{
		$max_query=mysql_query("select max($field) from $table");
		$fetch=mysql_fetch_row($max_query);
		$maxID=$fetch[0];
		//print $maxID;
		//print "<br>";
		$prefixLength=strlen($prefix);
		$onlyID=substr($maxID,$prefixLength);
		$newID=(int)($onlyID);
		$newID++;
		$zero=$idLength-$prefixLength-strlen($newID);
		$zero_repeat=str_repeat("0",$zero);
		$madeID=$prefix.$zero_repeat.$newID;
		//print $madeID;
		return($madeID);
	}
	$fetch[2]=makeID('cetagory_information','Cetagory_ID','Cetagory-','14');
//.......................................................................................................................//
	$Item_Name=$_POST["item_name"];
	$Cetagory_Name=$_POST["Cetagory_Name"];
	$Cetagory_ID=$_POST["Cetagory_ID"];
//.....................................................Add.....................................................................	
if(isset($_POST["Add"]))
{
	mysql_query("insert into cetagory_information (`Item_Name`,`Cetagory_Name`,`Cetagory_ID`) VALUES ('$Item_Name','$Cetagory_Name','$Cetagory_ID')");
	if(mysql_affected_rows()>0)
	{
		if(!empty($Item_Name) && !empty($Cetagory_Name) && !empty($Cetagory_ID))
		{
			$fetch[2]=makeID('cetagory_information','Cetagory_ID','Cetagory-','14');
			$uploded="../../../cetagory_image/".$_POST["Cetagory_ID"].".jpg";
			//print"$uploded";
			move_uploaded_file($_FILES['image_file']['tmp_name'],$uploded);
			$message="<span style='color:#ffffff; font-size:22px'>Data Insert Successfully</span>";
		}
		else
		{
			$message="<span style='color:#ffffff; font-size:22px'>Data Insert Unsuccessfully</span>";
		}
	}
	else
	{
		echo "<script>alert('Plese Fill Up Your Field')</script>";	
	}
}
//..........................................................EDIT.................................................................
if(isset($_POST["EDIT"]))
{
	mysql_query("replace into cetagory_information (`Item_Name`,`Cetagory_Name`,`Cetagory_ID`) VALUES ('$Item_Name','$Cetagory_Name','$Cetagory_ID')");
	if(mysql_affected_rows()>0)
		{
			$uploded="../../../cetagory_image/".$_POST["Cetagory_ID"].".jpg";
			//print"$uploded";
			move_uploaded_file($_FILES['image_file']['tmp_name'],$uploded);
			$message="<span style='color:#ffffff; font-size:22px'>Data Edit Successfully</span>";
		}
		else
		{
			$message="<span style='color:#ffffff; font-size:22px'>Data Edit Unsuccessfully</span>";	
		}
}
//...............................................................DELETE.............................................................
	if(isset($_POST["DELETE"]))
	{
		mysql_query("DELETE from cetagory_information where Cetagory_ID='$Cetagory_ID'");
			if(mysql_affected_rows()>0)
				{
					unlink("../../../cetagory_image/$Cetagory_ID.jpg");
					$message="<span style='color:#ffffff; font-size:22px;'>Data delete Successrully</span>";
				}
				else
				{
					$message="<span style='color:#ffffff; font-size:22px;'>Data delete Unsuccessrully</span>";
				}
	}
//................................................search..........................................................................
	if(isset($_POST["search"]))
	{
		$textsearch=$_POST["src_box"];
		$search_qauery=mysql_query("select * from cetagory_information where Cetagory_ID='$textsearch'");
		$fetch= mysql_fetch_row ($search_qauery);
		//print_r("$fetch");
	}
//..............................................VIEW..............................................................................
if(isset($_POST["VIEW"]))
	{
		$select_info=mysql_query("select Item_Name,Cetagory_Name,Cetagory_ID from cetagory_information");
		$total_field=mysql_num_fields($select_info);
		//print "$total_field";
		$table="<table width='500px' align='center'>";
			$table.="<tr class='view_table_tr' align='center'>";
				$table.="<td>Item Name</td>";
				$table.="<td>Cetagory Name</td>";
				$table.="<td>Cetagory ID</td>";
				$table.="<td>Cetagory Picture</td>";
			$table.="</tr>";
			
			while($fatch_info=mysql_fetch_array($select_info))
			{
				$table.="<tr>";
					for($b=0;$b<$total_field;$b++)
					{
						$table.="<td align='center'>$fatch_info[$b]</td>";	
					}
					$table.="<td align='center'><img src='../../../cetagory_image/$fatch_info[2].jpg' height='80px' width='120px'</td>";
				$table.="</tr>";
			}
		$table.="</table>";
	}
?>



<html>
	<head>
		<title>Cetagory Information</title>
			<style type="text/css">
				.header{color:#000000; font-size:26px; font-family:"comic Sans MS"; font-style:italic; text-shadow:#FFF 2px 2px 2px ;}
				.search{ height:28px; width:80px; background-color:#000000; color:#FFFFFF; font-size:18px; font-family:"Comic Sans MS", cursive; font-style:italic; margin-left:0px; border:0px;}
				.search:hover{ background-color:#1E1E1E;}
				.src_box{height:28px; width:230px;  font-size:18px;font-family:"Comic Sans MS", cursive; font-style:italic; color:#000000; margin-left:150px; padding-left:20px;}
				.nme{ font-size:22px; font-family:"comic Sans MS"; font-style:italic; color:#000000; letter-spacing:1px;}
				.inputbox{height:28px; width:300px; font-size:17px;font-family:"Comic Sans MS", cursive; font-style:italic; color:#000000;  padding-left:10px;}
				.imgbotton{ background-color: #000000; border: 0px none; color: #ffffff;font-family: "comic Sans MS";font-size:18px;font-style:italic;height: 28px;margin-left: -17px; width: 242px;}
				.Submit{ height:32px; width:100px; border:1px #FFFFFF solid; background-color:#000000; color:#FFFFFF; margin-left:45px; font-size:22px;font-family:"comic Sans MS"; font-style:italic; padding-bottom:10px;}
				.Submit:hover{ background-color:#FFFFFF; color:#000; border:1px #000 solid;}
				.view_table_tr{ height="40px"; font-size:18px; color:#FFF; background:#000;}
				.ItmNmecategory{ color: #000000;font-family: "comic Sans MS";font-size:18px;font-style:italic;height: 28px;margin-left:65px; width: 150px;}
			</style>
	</head>
    
	<body>
		<form name="Cetagory_Information" method="post" action="" enctype="multipart/form-data">
            <table height="329" width="612"  border="0px" cellpadding="0px" cellspacing="0px" align="center">
                <tr  align="center" class="header">
                    <td height="76" colspan="2" ><h1>Cetagory Information</h1></td>
                </tr>
                <tr>
                    <td height="43" colspan="2"> 
                        <input type="text" name="src_box" class="src_box">
                        <input type="submit" name="search" class="search" value="Search">
                    </td>
                </tr>
                <tr>
                    <td width="291"  align="center"; class="nme"> Item Name</td>
                    <td width="337">
                        <select name="item_name" class="ItmNmecategory">
                          <option><?php print $fetch[0] ?></option>
                          <?php $mysqlquery= mysql_query("SELECT * from item_information");
						  while($fetch_item=mysql_fetch_array($mysqlquery))
						  {?>
                          <option><?php print"$fetch_item[0]";  ?>
                          <?php } ?>
                          </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td  class="nme"; align="center">Cetagory Name</td>
                    <td>
                        <input type="text" name="Cetagory_Name" class="inputbox" id="Cetagory_Name" value="<?php print $fetch[1]?>">
                    </td>
                </tr>
                <tr>
                  <td class="nme"; align="center">Cetagory ID</td>
                  <td><input type="text" name="Cetagory_ID" class="inputbox" id="Cetagory_ID" value="<?php print $fetch[2]?>"></td>
                </tr>
                <tr>
                    <td class="nme"; align="center">Cetagory Image</td>
                    <td align="center"><input type="file" name="image_file"  value="file" class="imgbotton"></td>
                </tr>
                <tr>
                    <td height="62" colspan="2">
                        <input type="submit" name="Add" value="ADD" class="submit">
                        <input type="submit" name="EDIT" value="EDIT" class="submit">
                        <input type="submit" name="VIEW" value="VIEW" class="submit">
                        <input type="submit" name="DELETE" value="DELETE" class="submit">
                    </td>
                </tr>
                <tr>
                    <td height="25px" colspan="3" align="center"><?php print $message ?><?php print $table ?></td>
                </tr>
            </table>
	</form>
	</body>
</html>