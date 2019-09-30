<?php
include("php/db-connect/connection.php");
$ID=$_GET["ID"];
//print "$ID";
$PdtDtls=mysql_query("select * from product_information where Product_ID='$ID'");
$PdtDtlsFetch=mysql_fetch_array($PdtDtls);
//print "$PdtDtlsFetch";
?>
<table width="700" height="565" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="361px" colspan="2" align="center"><img src="product_image/<?php print $PdtDtlsFetch[2]?>.jpg" height="300px" width="" /></td>
  </tr>
  <tr>
    <td width="400px" align="center">Model</td>
    <td ><?php print "$PdtDtlsFetch[3]";?></td>
  </tr>
  <tr>
    <td align="center">Price</td>
    <td><?php print "$PdtDtlsFetch[6]";?></td>
  </tr>
  <tr>
    <td align="center">Detials</td>
    <td><?php print "$PdtDtlsFetch[5]";?></td>
  </tr>
  <tr>
    <td align="center">Stock</td>
    <td><?php print "$PdtDtlsFetch[4]";?></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><form id="form1" name="form1" method="post" action="">
      <input type="text" name="quantity" placeholder="Enter Quantity" class="quantity"/>
      <input type="submit" name="buy" value="BUY" class="buy"/>
      <input type="hidden" name="hidnPDTid" value="<?php print $PdtDtlsFetch[2]; ?>" />
    </form></td>
  </tr>
</table>
<style type="text/css">
	.quantity{ height:30px; width:250px; border:none; padding-left:10px; margin-left:-20px;}
	.buy{height:30px; width:50px; border:none;}
</style>
