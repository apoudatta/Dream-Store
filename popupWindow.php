<?php 
	include("php/db-connect/connection.php");
	$ID=$_GET["ID"];
	//print "$ID";
	$popup_id=mysql_query("select * from product_information where Product_ID='$ID'");
	//print "$popup_id";
	$fetch_popup_id=mysql_fetch_array($popup_id);
	//print $fetch_popup_id[1];
?>
<html>
<body background="image/a.jpg">
<table width="467" height="410" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th height="275" colspan="3" scope="col"><img src="product_image/<?php print $fetch_popup_id[2]?>.jpg" height="250px" width="250px" style="border-radius:10px"/></th>
  </tr>
  <tr>
    <th width="175" align="right" scope="row">Model</th>
    <th width="32" height="25" scope="row">:</th>
    <td width="260"><?php print $fetch_popup_id[3]?></td>
  </tr>
  <tr>
    <th align="right" scope="row">Price</th>
    <th height="26" scope="row">:</th>
    <td><?php print $fetch_popup_id[6]?> TAKA</td>
  </tr>
  <tr>
    <th align="right" scope="row">Stock</th>
    <th height="24" scope="row">:</th>
    <td><?php print $fetch_popup_id[4]?></td>
  </tr>
  <tr>
    <th align="right" scope="row">Details</th>
    <th height="62" scope="row">:</th>
    <td><?php print $fetch_popup_id[5]?></td>
  </tr>
</table>
</body>
</html>