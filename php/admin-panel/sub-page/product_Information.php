<?php
include("../../db-connect/connection.php");
//......................................................Auto ID Generate.....................................................//
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
	$fetch_search[2]=makeID('product_information','Product_ID','Product-','13');
	
//.......................................................................................................................//
$item_name=$_POST["item_name"];
$catagory_name=$_POST["catName"];
$product_id=$_POST["Product_ID"];
$productName=$_POST["Product_Name"];
$ProductStock=$_POST["Product_Stock"];
$Product_details=$_POST["Product_Details"];
$ProductPrice=$_POST["Product_Price"];
//.............................................ADD...............................................................
if(isset($_POST["ADD"]))
{
	if(!empty($item_name) &&  !empty($catagory_name) && !empty($product_id) && !empty($productName))
	{
		mysql_query("insert into product_information (`Item_Name`,`Category_Name`,`Product_ID`,`Product_Name`,`Product_Stock`,`Product_Details`,`Product_Price`) values('$item_name','$catagory_name','$product_id','$productName','$ProductStock','$Product_details','$ProductPrice')");
		if(mysql_affected_rows()>0)
		{
			$fetch_search[2]=makeID('product_information','Product_ID','Product-','13');
			//print "$fetch[2]";
			$uploded="../../../product_image/".$_POST["Product_ID"].".jpg";
			//print"$uploded";
			move_uploaded_file($_FILES['image_file']['tmp_name'],$uploded);
			$message="<span style='color:#ffffff; font-size:22px;'>Data Insert Successfully</span>";	
		}
		else
		{
			$message="<span style='color:#ffffff; font-size:22px;'>Data Added Unsuccessfully</span>";
		}
	}
	else
	{
		$message="<span style='color:#ffffff; font-size:22px;'>Empty !!! Please fill all box.</span>";
	}
}
//........................................................ EDIT ......................................................//
if(isset($_POST["EDIT"]))
	{
		mysql_query("replace into product_information (`Item_Name`,`Category_Name`,`Product_ID`,`Product_Name`,`Product_Stock`,`Product_Details`,`Product_Price`) values ('$item_name','$catagory_name','$product_id','$productName','$ProductStock','$Product_details','$ProductPrice')");

			if(mysql_affected_rows()>0)
			{
				 $image_uplode="../../../product_image/$product_id.jpg";
				 //print "$image_uplode";
				 move_uploaded_file($_FILES['image_file']['tmp_name'],$image_uplode);
				$message="<span style='color:#ffffff; font-size:22px;'>Data Edit Successfully</span>";	
			}
			else
			{
				$message="<span style='color:#ffffff; font-size:22px;'>Data Edit Unsuccessfully</span>";	
			}
	}
//.................................................DELETE...................................................................
if(isset($_POST["DELETE"]))
	{
		mysql_query("delete from product_information where Product_ID='$product_id'");
		if(mysql_affected_rows()>0)
		{
			unlink("../../../product_image/$product_id.jpg");
			$message="<span style='color:#ffffff; font-size:22px;'>Data delete Successfully</span>";
		}
		else
		{
			$message="<span style='color:#ffffff; font-size:22px;'>Data delete Unsuccessfully</span>";
		}
	}
//........................................................ SEARCH ......................................................//
if(isset($_POST["SerchBotun"]))
	{
		$SearchBox=$_POST["SearchBox"];
		$search_query=mysql_query("select * from product_information where Product_ID='$SearchBox'");
		//print "$search_query";
		$fetch_search=mysql_fetch_array($search_query);
		//print_r($fetch_search);
	}
//........................................................ view ......................................................//
	
if(isset($_POST["VIEW"]))
	{
		$select_info=mysql_query("select * from product_information");
		$total_field=mysql_num_fields($select_info);
		//print "$total_field";
		$table="<table width='1080px' align='center'>";
			$table.="<tr class='view_table_tr' align='center'>";
				$table.="<td>Item Name</td>";
				$table.="<td>Cetagory Name</td>";
				$table.="<td>Product ID</td>";
				$table.="<td>Product Name</td>";
				$table.="<td>Product Stock</td>";
				$table.="<td>Product Details</td>";
				$table.="<td>Product Price</td>";
				$table.="<td>Product Picture</td>";
			$table.="</tr>";
			
			while($fatch_info=mysql_fetch_row($select_info))
			{
				//print "$fatch_info[2]";
				$table.="<tr>";
					for($b=0;$b<$total_field;$b++)
					{
						$table.="<td align='center'>$fatch_info[$b]</td>";	
					}
					$table.="<td align='center'><img src='../../../product_image/$fatch_info[2].jpg' height='80px' width='120px'</td>";
				$table.="</tr>";
				
			}
		$table.="</table>";
	}

?>
<html>
	<head>
		<title>Product Information</title>
		<style type="text/css">
			.heading{color:#000000; font-size:26px; font-family:"comic Sans MS"; font-style:italic; text-shadow:#FFF 2px 2px 2px;}
			.Submit{ height:32px; width:100px; border:0px; background-color:#000000; color:#FFFFFF; margin-left:35px; font-size:24px;font-family:"comic Sans MS"; font-style:italic;}
			.Submit:hover{ background-color:#1E1E1E;}
			.TEXT{ height:30PX; width:300PX; margin-left:20PX; border:1PX; font-size:22px; font-family:"comic Sans MS"; font-style:italic; background-color:#FFFFFF; padding-left:20px;}
			.name{ font-size:22px; font-family:"comic Sans MS"; font-style:italic; color:#000000; letter-spacing:1px;}
			.Choose_category{height:30px; width:150px; border:0px; background-color:#FFFFFF; color:#0000; margin-left:10px; font-size:18px;font-family:"comic Sans MS"; font-style:italic;}
			.imgbotton{ background-color: #000000; border: 0px none; color: #ffffff;font-family: "comic Sans MS";font-size:18px;font-style:italic;height: 28px;margin-left: -17px; width: 242px;}
			.ItmNmecategory{ color: #000000;font-family: "comic Sans MS";font-size:18px;font-style:italic;height: 28px;margin-left: -17px; width: 150px;}
			.view_table_tr{ height="40px"; align="center"; font-size:18px; color:#FFF; background:#000;}
        </style>
	</head>
    
    <body>
        <form id="form" name="form" method="post" action="" enctype="multipart/form-data">
            <table width="700" height="auto" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr class="heading">
                    <th height="35px" colspan="2" valign="middle" ><h1>Product Information</h1></th>
                </tr>
                <tr>
                    <td height="37" colspan="2">
                        <input type="text" name="SearchBox" class="TEXT" id="SearchBox"/>
                        <input type="submit" name="SerchBotun" value="Search" class="Submit" id="SerchBotun"/>
                  </td>
                </tr>
                <tr  align="center">
                    <td width="241" height="45" class="name">Item Name </td>
                    <td width="341">
                        <select name="item_name" class="ItmNmecategory">
                        <?php
						if(isset($_POST["SerchBotun"]))
						{
						?>
						
                         <option><?php print "$fetch_search[0]" ?></option>
                         <?php
						}
						if(isset($_POST["ChooseCatagory"]))
						{
						 ?>
                          <option><?php print "$item_name" ?></option>
                         
                          <?php 
						  
						}$mysqlquery= mysql_query("SELECT * from item_information");
						  while($fetch=mysql_fetch_array($mysqlquery))
						  {?>
                          <option><?php print"$fetch[0]";  ?>
                          <?php } ?>
                          </option>
                        </select>
                        <input type="submit" name="ChooseCatagory" value="ChooseCatagory">
                    </td>
                </tr>
                <tr align="center">
                    <td height="39" class="name">Category Name </td>
                    <td>
                        <select class="ItmNmecategory" name="catName">
                         <option><?php print "$fetch_search[1]" ?></option>
                        	<?php
                            if(isset($_POST['ChooseCatagory']))
							{
								$query=mysql_query("select * from cetagory_information where Item_Name='$item_name'");
								while($fetch_item=mysql_fetch_row($query))
								{
							?>
                           
							<option><?php print $fetch_item[1]?></option>
                            <?php
								}	
							}
							?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td height="40" align="center"class="name">Product ID </td>
                    <td>
                        <input type="text" name="Product_ID" class="TEXT" id="Product_ID" value="<?php print $fetch_search[2] ?>"/>
                    </td>
                </tr>
                <tr>
                    <td height="43" align="center" class="name">Product Name</td>
                    <td>
                        <input type="text" name="Product_Name" class="TEXT" id="Product_Name" value="<?php print $fetch_search[3] ?>"/>
                    </td>
                </tr>
                <tr>
                    <td height="43" align="center" class="name">Product Stock </td>
                    <td>
                         <input type="text" name="Product_Stock" class="TEXT" id="Product_Stock" value="<?php print $fetch_search[4] ?>" />
                    </td>
                </tr>
                <tr>
                    <td height="43" align="center"class="name">Product Details </td>
                    <td>
                        <input type="text" name="Product_Details" class="TEXT" id="Product_Details" value="<?php print $fetch_search[5] ?>" />
                    </td>
                </tr>
                <tr>
                    <td height="43" align="center"class="name">Product Price </td>
                    <td>
                        <input type="text" name="Product_Price" class="TEXT" id="Product_Price" value="<?php print $fetch_search[6] ?>"/>
                    </td>
                </tr>
                <tr align="center">
                    <td height="43" class="name">Product Picture </td>
                    <td>
                        <input type="file" name="image_file"  value="file" class="imgbotton" id="image_file"/>
                    </td>
                </tr>
                <tr>
                    <td height="67" colspan="2">
                        <input type="submit" name="ADD" value="ADD" class="Submit"/>
                        <input type="submit" name="EDIT" value="EDIT" class="Submit"/>
                        <input type="submit" name="VIEW" value="VIEW" class="Submit"/>
                        <input type="submit" name="DELETE" value="DELETE" class="Submit"/>
                        <input type="submit" name="CLEAR" value="CLEAR" class="Submit"/>
                    </td>
                </tr>
                 <tr>
                    <td height="25px" colspan="3" align="center"><?php print "$message" ?><?php print $table ?></td>
                </tr>
            </table>
        </form>
    </body>
</html>
