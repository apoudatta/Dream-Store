<?php
include ("../../db-connect/connection.php");
//............................................Auto ID Generate..................................................................//
	function makeID($table,$field,$prefix,$IdLength)
	{
		$max_query=mysql_query("select max($field) from $table");
		$fetch=mysql_fetch_row($max_query);
		$maxID=$fetch[0];
		//print $maxID;
		//print "<br>";
		$prefixLength=strlen($prefix);
		//print $prefixLength;
		//print "<br>";
		$onlyID=substr($maxID,$prefixLength);
		//print $onlyID;
		//print "<br>";
		$newID=(int)($onlyID);
		//print $newID;
		//print "<br>";
		$newID++;
		//print $newID;
		//print "<br>";
		$zero=$IdLength-$prefixLength-strlen($newID);
		//print $zero;
		//print "<br>";
		$zero_repeat=str_repeat("0",$zero);
		//print $zero_repeat;
		//print "<br>";
		$madeID=$prefix.$zero_repeat.$newID;
		//print $madeID;
		return($madeID);
	}
	$fetch[1]=makeID('item_information','Item_ID','ITEM-','10');
//.........................................................................................................................//	
	$Item_Name=$_POST["Item_Name"];
	$Item_ID=$_POST["Item_ID"];
//..........................................................................................................................	
	if(isset($_POST["add"]))
	{
		mysql_query("insert into item_information(`ITEM_NAME`,`Item_ID`)VALUES('$Item_Name','$Item_ID')");
		if(mysql_affected_rows()>0)
		{
			if(!empty($Item_Name) && !empty($Item_ID))
				{
					$fetch[1]=makeID('item_information','Item_ID','ITEM-','10');
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
//......................................................EDIT.....................................................................
	if(isset($_POST["EDIT"]))
	{
		mysql_query("replace into item_information (`Item_Name`,`Item_ID`) VALUES ('$Item_Name','$Item_ID')");
			if(mysql_affected_rows()>0)
				{
					$message="<span style='color:#ffffff; font-size:22px'>Data Edit Successfully</span>";
				}
				else
				{
					$message="<span style='color:#ffffff; font-size:22px'>Data Edit Unsuccessfully</span>";	
				}
	}
//...........................................................DELETE.................................................................
	if(isset($_POST["DELETE"]))
	{
		mysql_query("delete from item_information where Item_ID='$Item_ID'");
			if(mysql_affected_rows()>0)
				{
					$fetch[1]=makeID('item_information','Item_ID','ITEM-','10');
					$message="<span style='color:#ffffff; font-size:22px;'>Data delete Successrully</span>";
				}
				else
				{
					$message="<span style='color:#ffffff; font-size:22px;'>Data delete Unsuccessrully</span>";
				}
	}
//...............................................Search................................................................................
	if(isset($_POST["Search"]))
	{
		$textsearch=$_POST["searchbox"];
		$search_qauery=mysql_query("select * from item_information where Item_ID='$textsearch'");
		$fetch= mysql_fetch_row ($search_qauery);
		//print_r("$fetch");
	}
//.......................................................VIEW........................................................................
	if(isset($_POST["VIEW"]))
	{
		$select_info=mysql_query("SELECT ITEM_NAME,Item_ID From item_information");
		$total_field=mysql_num_fields($select_info);
		//print "$total_field";
		$table="<table width='300px' align='center'>";
			$table.="<tr class='view_table_tr' align='center'>";
				$table.="<td>Item Name</td>";
				$table.="<td>Item ID</td>";
			$table.="</tr>";
			while($fatch_info=mysql_fetch_array($select_info))
			{
				$table.="<tr>";
					for($b=0;$b<$total_field;$b++)
					{
						$table.="<td align='center'>$fatch_info[$b]</td>";	
					}
				$table.="</tr>";
			}
		$table.="</table>";
	}
?>

<html>
<head>
	<title>Item Information</title>
	<style type="text/css">
        .header{ color:#000000; font-size:26px;font-family:"Courier New", Courier, monospace;font-style:italic; letter-spacing:1px; text-shadow:#FFF 2px 2px 2px; padding-top:20px;}
        .search{ height:30px; width:250px; margin-left:100px; border:1px;font-size:18px; font-family:"comic Sans MS"; background-color:#FFFFFF; color:#000000;letter-spacing:1px; padding-left:15px;}
        #name{ font-size:24px; font-family:"comic Sans MS"; color:#000000; letter-spacing:1px;}
        .name{ height:35px; width:300px; margin-left:25px; font-size:18px; color:#000000; background-color:#FFFFFF; 			letter-spacing:1px; padding-left:15px;}
        .submit{ height:30px; width:100px; background-color:#000000; font-size:24px; font-family:"Courier New", Courier,monospace; color:#FFFFFF; border:0px; margin-left:25px;letter-spacing:1px;}
        .submit:hover{ background-color:#1E1E1E;}
		.view_table_tr{ height="40px"; font-size:18px; color:#FFF; background:#000;}
    </style>
</head>
    
    
<body>
	<form name="" method="post" action="" enctype="multipart/form-data" >
        <table height="295" width="650px" align="center" cellpadding="0px" cellspacing="0px">
            <tr height="100px" class="header">
                <td height="63" colspan="2" align="center"><h1>ITEM INFORMATION</h1></td>
            </tr>
            <tr height="50px" >
                <td height="42" colspan="2">
                    <input type="text" name="searchbox" class="search" id="searchbox" />
                    <input type="submit" name="Search" value="Search" class="submit" >
                </td>
            </tr>
            <tr id="name" >
                <td width="280" height="55" align="center">Item Name</td>
                <td width="364" >
                	<input name="Item_Name" type="text" class="name" id="Item_Name"  value="<?php print $fetch[0]?>" />
                </td>
            </tr>
            <tr id="name">
                <td height="57" align="center">Item ID</td>
                <td>
                	<input type="text" name="Item_ID" class="name" id="Item_ID"  value="<?php print $fetch[1]?>" />
                </td>
            </tr>
            <tr height="80px">
                <td height="51" colspan="2">
                    <input name="add" type="submit" class="submit" id="add" value="ADD"  />
                    <input name="EDIT" type="submit" class="submit" id="EDIT" value="EDIT"  />
                    <input name="VIEW" type="submit" class="submit" id="VIEW" value="VIEW"  />
                    <input name="DELETE" type="submit" class="submit" id="DELETE" value="DELETE"  />
                    <input type="submit" value="CLEAR" class="submit"  />
                </td>
            </tr>
            <tr>
                <td height="25px" colspan="3" align="center"><?php print $message ?><?php print $table ?></td>
            </tr>
        </table>
</form>
</body>
</html>