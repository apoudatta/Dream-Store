<?php
include("php/db-connect/connection.php");
//...........................................................delete........................................
if(isset($_POST["Delete"]))
{
	$item=count($_POST["pdtid"]);
	//print "$item";
	for($i=0; $i<$item; $i++)
	{
		$pdt=$_POST["pdtid"][$i];
		if($_POST["pdtid"][$i] != "")
		{
			mysql_query("DELETE from shopping_card where product_id='$pdt'");
		}
	}
}

//...........................................................Process_Order........................................
$account_title=$_POST["account_title"];
$account_number=$_POST['account_number'];
$password=$_POST['password'];
$total_amount=$_POST["total_amount"];

if(isset($_POST["Process_Order"]))
{
	$query_credit=mysql_query("SELECT * from credit_card WHERE Account_Title='$account_title' AND Account_Number='$account_number'  AND Password='$password'");
	if(mysql_affected_rows()>0)
	{
		$fetch_credit=mysql_fetch_row($query_credit);
		if($fetch_credit[1]==$account_title && $fetch_credit[2]==$account_number && $fetch_credit[3]==$password)
		{
			if($fetch_credit[4]>=$total_amount)
			{
			 print "<script>location='index.php?page=Order_from'</script>";	
			}
			else
			{
			$message="<span style='color:#ffffff; font-size:22px;'>You have not enough blance !!!</span>";
			}
		}
		else
		{
		print "Please select currect information.";	
		}
	}
}

?>


<style>
.SpingCrdHdr{
	color: #000;
	background:linear-gradient(#AE5547,#CCF,#AE5547);
	}
.CardOption{
	font-size:16px;
	color:#FFF;
	font-weight:bold;
	letter-spacing:1;
	}
.DltUpdt{
	height:40px;
	width:300px;
	border:none;
	background-color:#FFF;
	font-size:18px;
	font-weight:bold;
	letter-spacing:1;
	}
.CrdFtr{
	background:linear-gradient(#AE5547,#CCF,#AE5547);
	}
.Balance_Varyfy{
	color: #000;
	background:linear-gradient(#AE5547,#CCF,#AE5547);
	}
.text{
	font-size:20px;
	font-weight:bold;
	}
.txtBox{
	height:30px;
	width:250px;
	padding-left:15px;
	font-size:20px;
	font-weight:bold;
	border:none;
	}
.mgs{
	height:35px;
	width:350px;
	background:linear-gradient(#CCF,#fff)
	}
.quantity{
	height:30px;
	width:55px;
	border:none;
	font-size:20px;
	font-weight:bold;
	padding-left:20px;
	}
.checkbox{
	height:17px;
	width:17px;
	background-color:#fff;
	border:none;
	}
</style>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<table width="1126" height="351" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th height="40" colspan="8" class="SpingCrdHdr" scope="col"><h2>Shopping Card</h2></th>
  </tr>
  <tr class="CardOption">
    <td width="91" height="51" align="center">Select For Delete</td>
    <td width="47" align="center">SL.NO</td>
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
	  
	  if(isset($_POST["Update"]))
	  {
		$val=$_POST["qun"][$x];
		//print "<script>alert('$val')<//script>";
		if($fetch_shopping['quantity']!=$val)
		{
		//print "<script>alert('Found')<//script>";
		mysql_query("update dreamstore.shopping_card set quantity='$val' where session_id='$session_id' and product_id='$fetch_shopping[product_id]'");
		$fetch_shopping['quantity']=$val;
		}
	  }
	  
	  $x++;
	  $amount=$fetch_shopping['product_price']*$fetch_shopping['quantity'];
	  $total_amount=$amount+$total_amount;
  ?>
  <tr style="font-weight:bold; letter-spacing:1px;">
    <td height="107" align="center"><input name="pdtid[]" type="checkbox" class="checkbox" value="<?php print $fetch_shopping['product_id']?>" /></td>
    <td align="center"><?php print $x;?></td>
    <td align="left"><?php print $fetch_shopping['product_name'];?></td>
    <td align="center"><img src="product_image/<?php print $fetch_shopping['product_id']?>.jpg" height="100" width="110" /></td>
    <td align="center"><?php print $fetch_shopping['product_details'];?></td>
    <td align="center"><?php print $fetch_shopping['product_price'];?></td>
    <td align="center"><input type="text" value="<?php print $fetch_shopping['quantity']?>" class="quantity" name="qun[]"/></td>
    <td align="center"><?php print $amount;?></td>
  </tr>
  <?php
  }
  ?>
  <tr style="color:#FFF">
    <td height="42" colspan="7"><?php 
	
	
	
	
	
	
	
	
	?><h2 align="right">TOTAL</h2></td>
    <td align="center">
    	<h2><?php print $total_amount;?></h2>
        <input type="hidden" name="total_amount" value="<?php print $total_amount;?>" />
    </td>
  </tr>
  <tr>
    <td height="54" colspan="8" align="center">
            <input type="submit" name="Delete" class="DltUpdt" value="Delete From Chart" />
            <input type="submit" name="Update" class="DltUpdt" value="Update  From Chart" />
    </td>
  </tr>
  <tr>
    <td height="15" colspan="8" align="center" class="CrdFtr"></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="1126" height="212" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
    <th height="47" class="Balance_Varyfy" scope="col"><h2>Account Balance Varyfy</h2></th>
  </tr>
  <tr>
    <td align="center"><table width="608" height="155" border="0" cellpadding="0" cellspacing="0">
      <tr class="text">
        <td width="260" align="right" scope="col">Account title</td>
        <td width="33" align="center" scope="col">:</td>
        <td width="315" scope="col"><input type="text" name="account_title" class="txtBox" /></td>
      </tr>
      <tr class="text">
        <td align="right">Account Number</td>
        <td align="center">:</td>
        <td><input type="text" name="account_number" class="txtBox" /></td>
      </tr>
      <tr class="text">
        <td align="right">Password</td>
        <td align="center">:</td>
        <td><input type="password" name="password" class="txtBox" /></td>
      </tr>
      <tr>
        <td colspan="3" align="center">
          <input type="submit" name="Process_Order" class="DltUpdt" value="Process Order" />
        </td>
      </tr>
      
    </table>
    </td>
  </tr>
  <tr>
    <td height="15" colspan="8" align="center" class="CrdFtr"></td>
  </tr>
  <tr>
    <td height="40" colspan="8" align="center"><?php print "$message";?>
    </td>
  </tr>
</table>
</form>