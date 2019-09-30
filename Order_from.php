<?php
include("php/db-connect/connection.php");
//......................................................Auto ID Generate.....................................................//
	function makeID($table,$field,$prefix,$idLength)
	{
		$max_query=mysql_query("select max($field) from $table");
		//print "$max_query";
		$fetch=mysql_fetch_row($max_query);
		//print "$fetch";
		$maxID=$fetch[0];
		//print "$maxID";	
		$prefixLength=strlen($prefix);
		//print "$prefixLength";	
		$onlyID=substr($maxID,$prefixLength);
		//print "$onlyID";	
		$newID=(int)($onlyID);
		//print "$newID";	
		$newID++;
		$zero=$idLength-$prefixLength-strlen($newID);
		//print "$zero";	
		$zero_repeat=str_repeat("0",$zero);
		//print "$zero_repeat";	
		$madeID=$prefix.$zero_repeat.$newID;
		//print "$madeID";
		return($madeID);
	}
	$Customer_id=makeID('customer_information','Customer_ID','Customer-','13');
	$Delivery_id=makeID('customer_information','Customer_ID','Delivery-','13');
//.......................................................................................................................//
	$customer_id=$_POST["customer_id"];
	$customer_name=$_POST["customer_name"];
	$contuct_no=$_POST["contuct_no"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$customer_adress=$_POST["customer_adress"];
	
	$delivery_id=$_POST["delivery_id"];
	$delivery_Date=$_POST["delivery_Date"];
	$Shipment_Type=$_POST["Shipment_Type"];
	$Shipment_To=$_POST["Shipment_To"];
	$Contact_No=$_POST["Contact_No"];
	$Email=$_POST["Email"];
	$Shipment_Address=$_POST["Shipment_Address"];
//......................................................submit.....................................................//

if(isset($_POST["submit"]))
{
	if(!empty($customer_id)and !empty($customer_name)and !empty($email)and !empty($password)and !empty($delivery_id)and !empty($delivery_Date)and !empty($Shipment_Type)and !empty($Email))
	{
		mysql_query("insert into customer_information(`Customer_ID`,`Customer_Name`,`Contact_No`,`Email`,`Password`,`customer_Address`) values ('$customer_id','$customer_name','$contuct_no','$email','$password','$customer_adress')");
		$Customer_id=makeID('customer_information','Customer_ID','Customer-','13');
		$customer_img_uplode="image/customer_image/$customer_id.jpg";
		move_uploaded_file($_FILES['customer_img_fld']['tmp_name'],$customer_img_uplode);
		
		mysql_query("insert into dreamstore.delivery_information
		(`delivery_id`,`delivery_Date`,`Shipment_Type`,`Shipment_To`,`Contact_No`,`Email`,`Shipment_Address`) values ('$delivery_id','$delivery_Date','$Shipment_Type','$Shipment_To','$Contact_No','$Email','$Shipment_Address')");
		$Delivery_id=makeID('customer_information','Customer_ID','Delivery-','13');
		$delivery_img_uplode="image/delivery_image/$delivery_id.jpg";
		move_uploaded_file($_FILES['delivery_img_fld']['tmp_name'],$delivery_img_uplode);
		
		if(mysql_affected_rows()>0)
		{
			print "<script>location='index.php?page=invoice'</script>";
		}
		else
		{
			$message="<span style='color:#FFFFFF;font-size:20px; font-weight:bold;'>Information submit Error.</span>";
		}
	}
	else
	{
		$message="<span style='color:#FFFFFF;font-size:20px; font-weight:bold;'>please select all box.</span>";	
	}
}	
?>  
<style type="text/css">
  .header{
	  height:30px;
	  color: #000;
	  background:linear-gradient(#AE5547,#CCF,#AE5547);
	  }
  .textfield{
	  height:30px;
	  width:250px;
	  padding-left:15px;
	  font-size:20px;
	  font-weight:bold;
	  border:none;
	  }
  .text{
	  font-size:20px;
	  font-weight:bold;
	  padding-right:30px;
	}
  .CardOption{
	font-size:16px;
	color:#FFF;
	font-weight:bold;
	letter-spacing:1;
	}
  .Balance_Varyfy{
	color: #000;
	background:linear-gradient(#AE5547,#CCF,#AE5547);
	}

  .checkbox{
	height:17px;
	width:17px;
	background-color:#fff;
	border:none;
	}
  .order_submit{
	height:40px;
	width:300px;
	border:none;
	background-color:#FFF;
	font-size:18px;
	font-weight:bold;
	letter-spacing:1;
	margin-left:400px;
	  }
  .confirm_order{
	height:32px;
	width:230px;
	border:none;
	background-color:#FFF;
	font-size:20px;
	font-weight:bold;
	letter-spacing:1;
	margin-left:400px;
	  }
  .picFld{
	  background-color:#000000;color:#ffffff;font-size:18px;font-style:italic;height:28px; width:242px;
	  }
  .Shipment_option{
	  font-size:18px;height:30px; width:250px;border:none;font-weight:bold;padding-left:15px;
	  }
</style>
 
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<table width="100%" height="250px" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th colspan="2" align="center" valign="top" class="header" scope="col"><h1>Confirm Order</h1></th>
    </tr>
    <tr>
      <td colspan="2"><input type="checkbox" name="checkbox" id="checkbox" />
      <label for="checkbox" class="text">Already Member</label></td>
    </tr>
    <tr>
      <td width="328" align="right" class="text">Member Email</td>
      <td width="366"><label for="textfield"></label>
      <input type="text" name="textfield" class="textfield" /></td>
    </tr>
    <tr>
      <td align="right" class="text">Member Password</td>
      <td><input type="password" name="textfield2" class="textfield"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="button" id="button" value="Submit" class="confirm_order"/></td>
    </tr>
    <tr>
      <td colspan="2"><?php   ?></td>
    </tr>
</table>
<table width="100%" height="450px" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <th colspan="2" scope="col" class="header"><h1>Customer Information</h1>
          <input type="hidden" name="customer_id" value="<?php print "$Customer_id" ?>"  />
        </th>
    </tr>
    <tr>
        <td width="339" align="right" class="text">Customer Name</td>
        <td width="355">
          <input type="text" name="customer_name" class="textfield" id="customer_name" />
        </td>
    </tr>
    <tr>
        <td align="right" class="text">Contact No</td>
        <td><input type="text" name="contuct_no" class="textfield" id="contuct_no" /></td>
    </tr>
    <tr>
        <td align="right" class="text">Email</td>
        <td><input type="text" name="email" class="textfield" id="email" /></td>
    </tr>
    <tr>
        <td align="right" class="text">Password</td>
        <td><input type="password" name="password" class="textfield" id="password" /></td>
    </tr>
    <tr>
        <td align="right" class="text">Retype Password</td>
        <td><input type="password" name="textfield7" class="textfield" /></td>
    </tr>
    <tr>
        <td align="right" class="text">customer Address</td>
        <td><textarea name="customer_adress" id="customer_adress" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
        <td align="right" class="text">Picture</td>
        <td><input type="file" name="customer_img_fld" class="picFld" id="customer_img_fld" /></td>
    </tr>
</table>
<table width="100%" height="450px" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th colspan="2" scope="col" class="header"><h1>Delivery / Shipment Information</h1>
        <input name="delivery_id" type="hidden" id="delivery_id" value="<?php print "$Delivery_id"?>"  />
      </th>
    </tr>
    <tr>
      <td width="340" align="right" class="text">Delivery Date</td>
      <td width="354"><input name="delivery_Date" type="text" class="textfield" id="delivery_Date" value="<?php print date('d-M-y   h:i:s a')?>" /></td>
    </tr>
    <tr>
      <td align="right" class="text">Shipment Type</td>
      <td>
        <select name="Shipment_Type" id="Shipment_Type" class="Shipment_option">
            <option>By Road</option>
            <option>By Eir</option>
            <option>By Ship</option>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right" class="text">Shipment To</td>
      <td><input type="text" name="Shipment_To" class="textfield" id="Shipment_To" /></td>
    </tr>
    <tr>
      <td align="right" class="text">Contac No</td>
      <td><input type="text" name="Contact_No" class="textfield" id="Contact_No" /></td>
    </tr>
    <tr>
      <td align="right" class="text">Email</td>
      <td><input type="text" name="Email" class="textfield" id="Email" /></td>
    </tr>
    <tr>
      <td align="right" class="text">Shipment Address</td>
      <td> <textarea name="Shipment_Address" id="Shipment_Address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td align="right" class="text">Picture</td>
      <td><input type="file" name="delivery_img_fld" id="delivery_img_fld" class="picFld" /></td>
    </tr>
</table>
<table width="100%" height="auto" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th colspan="8" class="header" scope="col"><h1>Shopping Card</h1></th>
  </tr>
  <tr class="CardOption">
    <td width="47" height="30" align="center">SL.NO</td>
    <td width="187" align="center">Product Name</td>
    <td width="211" align="center">Product Picture</td>
    <td width="214" align="center">Description</td>
    <td width="65" align="center">Price</td>
    <td width="218" align="center">Quantity</td>
    <td width="93" align="center">Amount</td>
  </tr>
  <?php
  $x=0;
  $total_amount=0;
  $select_shopping_card=mysql_query("SELECT * from shopping_card where session_id='$session_id'");
  while($fetch_shopping=mysql_fetch_array( $select_shopping_card))
  {
      $x++;
      $amount=$fetch_shopping['product_price']*$fetch_shopping['quantity'];
      $total_amount=$amount+$total_amount;
  ?>
  <tr style="font-weight:bold; letter-spacing:1px;">
    <td height="110" align="center"><?php print $x;?></td>
    <td align="left"><?php print $fetch_shopping['product_name'];?></td>
    <td align="center"><img src="product_image/<?php print $fetch_shopping['product_id']?>.jpg" height="100" width="110" /></td>
    <td align="center"><?php print $fetch_shopping['product_details'];?></td>
    <td align="center"><?php print $fetch_shopping['product_price'];?></td>
    <td align="center"><?php print $fetch_shopping['quantity']?></td>
    <td align="center"><?php print $amount;?></td>
  </tr>
  <?php
  }
  ?>
  <tr style="color:#FFF">
    <td height="42" colspan="6">
    <h2 align="right">TOTAL </h2>
    </td>
    <td align="center"><h2><?php print $total_amount;?></h2></td>
  </tr>
</table>
<input type="submit" name="submit" value="Submit" class="order_submit"  />
<h6 align="center"><?php print "$message";?></h6>
</form>
