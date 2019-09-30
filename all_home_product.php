<?php
	$select_item=mysql_query("select * from item_information");
	while($fetch_select_item=mysql_fetch_array($select_item))
	{
?>
<style type="text/css">
.item_name {
	color: #000;
	background:linear-gradient(#AE5547,#CCF,#AE5547);
	font-size:20px;
	font-weight:bold;
}
.pdct_tbl{
	margin-top:7px;
	border-radius:10px;
	margin-bottom:10px;
	}
	.pdct_tbl:hover{
		background:#771D0B;
		}
.viw_dtls{
	background:linear-gradient(#AE5547,#CCF,#AE5547);
	border:0px;
	color:#000;
	padding:4px;
	font-weight:lighter;
	border-radius:5px;
	text-decoration:none;
	}
	.viw_dtls:hover{
		background:#ffC;
		}
.image{ 
	transition:all 0.6s ease;
	-webkit-transition:all 0.6s ease;
	}
	.image:hover{
		transform:scale(1.3);
		-webkit-transform:scale(1.3);
		}
</style>

<table width="1125px;" border="0px" cellpadding="0" cellspacing="0">
    	<tr>
        	<td colspan="5" align="center" height="33px" class="item_name"><?php print $fetch_select_item[0]?></td>
    	</tr>
        <tr>
        <?php
        	$select_product=mysql_query("select * from product_information where Item_Name='$fetch_select_item[0]' order by rand() limit 4");
			while($fetch_select_product=mysql_fetch_array($select_product))
			{
		?>
        	<td align="center">
            	<table width="220px;" border="0px" cellpadding="0" cellspacing="0" class="pdct_tbl">
                	<tr>
                    	<td align="center" class="image">
                        <img src="product_image/<?php print $fetch_select_product[2]?>.jpg" height="210px" width="100%" style="border-radius:10px" onClick="window.open('popupwindow.php?ID=<?php print $fetch_select_product[2]?>','<?php print $fetch_select_product[2]?>','height=500,width=500');"/>
        				</td>
                    </tr>
                    <tr>
                    	<td align="center" style="color:#FFC; font-size:18px;"><?php print $fetch_select_product[3]?></td>
                    </tr>
                    <tr>
                    	<td align="center" style="color:#FFC; font-size:18px;"><?php print $fetch_select_product[6]?> TAKA</td>
                    </tr>
                    <tr>
                    	<td align="center" height="40px"><a href="index.php?page=ProductDetails&ID=<?php print $fetch_select_product[2]?>" class="viw_dtls">View Details</a></td>
                    </tr>
                </table>
            </td>
        <?php
            }
		?>
        </tr>
    </table>
<?php
	}
?>
