<?php 
	include("php/db-connect/connection.php");
	session_start();
	$session_id=session_id();
	//print $session_id;
	
	if(isset($_POST["buy"]))
	{
		$quantity=(int)($_POST["quantity"]);
		$hidnPDTid=$_POST["hidnPDTid"];
		if(!empty($quantity) && $quantity>=1)
		{
			$select_PDT=mysql_query("SELECT * from product_information WHERE Product_ID='$hidnPDTid'");
			if(mysql_affected_rows())
			{
				$fetch_PDT=mysql_fetch_array($select_PDT);
				mysql_query("insert into shopping_card (`session_id`,`product_id`,`product_name`,`product_details`,`product_price`,`quantity`) values('$session_id','$hidnPDTid','$fetch_PDT[Product_Name]','$fetch_PDT[Product_Details]','$fetch_PDT[Product_Price]','$quantity')");
					if(mysql_affected_rows()>0)
					{
						print "<script>location='index.php?page=shoppingcard'</script>";	
					}
					else
					{
						print "Sorry!! Please try again";
					}
			}
		}
		else
		{
			print "<script>alert('Please Fill up box')</script>";	
		}
	}
?>

<html>
	<head>
    	<title>www.DreamStore.com</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
       		<link rel="stylesheet" type="text/css" href="css/slider/bar/bar.css" />
            <link rel="stylesheet" type="text/css" href="css/slider/dark/dark.css" />
            <link rel="stylesheet" type="text/css" href="css/slider/default/default.css" />
            <link rel="stylesheet" type="text/css" href="css/slider/light/light.css" />
            <link rel="stylesheet" type="text/css" href="css/slider/nivo-slider.css" />
        	<link rel="stylesheet" type="text/css" href="css/home.css" />
    </head>
    
  <body>
  	<div class="main">
 		<div class="header">
        	<form id="serch" method="post" >
              <input type="text" name="input" placeholder="Enter Your Keyword" class="input" >
              <input type="submit" name="submit" value="GO" class="submit">
        	</form>
      	</div>
     	<div class="title">
        	<h1 class="DreamStore">DreamStore</h1>
        </div>
        <div class="menu">
        	<ul>
            	<li><a href="index.php">HOME</a></li>
                <li><a href="index.php?page=about">এবাউট আস</a></li>
                <li><a href="index.php?page=contact">CONTACT US</a></li>
                <li><a href="index.php?page=feedback">FEEDBACK</a></li>
                <li><a href="index.php?page=facility">FACILITY</a></li>
                <li><a href="login/login.php">LOGIN</a></li>
                <?php 
				$select_shoping=mysql_query("select * from shopping_card where session_id='$session_id'");
				$fetch_shoping=mysql_fetch_row($select_shoping);
				if(mysql_affected_rows())
				{
				?>
                <li><a href="index.php?page=shoppingcard" style="color:#FF0000;">SHOPPING CARD</a></li>
                <?php
				}
				?>
            </ul>
        </div>
        <div class="slider">
            <div class="slider-wrapper theme-bar">
                <div class="nivoSlider" id="slider">
                    <img src="image/slider1.jpg" title="This site developed by OPU DATTA"/>
                    <img src="image/slider2.jpg" alt=""/>
                    <img src="image/slider3.jpg" alt=""/>
                    <img src="image/slider4.jpg" alt=""/>
                </div>
            </div>
        </div>
        <div class="content">
        	<div class="left">
                    <div class="cat_header">
                        Cetagory
                    </div>
                <div class="cat">
                    <ul>
                        <?php 
                        $query_itmNme=mysql_query("select*from item_information");
                        while($fetch_itmNme=mysql_fetch_row($query_itmNme))
                        {
                        ?>
                        <li><?php print $fetch_itmNme[0] ?>
                            <ul class="sub_cat">
                                <?php 
                                $cat_query=mysql_query("select * from cetagory_information where Item_Name='$fetch_itmNme[0]'");
                                while($fetch_cat=mysql_fetch_row($cat_query))
                                {
                                ?>
                                <li><a href="index.php?page=ItmAllPdct&ITEM=<?php print "$fetch_cat[2]" ?>"><?php print "$fetch_cat[1]" ?></a></li>
                                <?php 
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="under_cat">
                <?php 
				$query_under_cat=mysql_query("select*from cetagory_information");
				while($fetch_under_cat=mysql_fetch_row($query_under_cat))
					{
					?>
					  <div class="table">
                      <a href="index.php?page=ItmAllPdct&ITEM=<?php print "$fetch_under_cat[2]" ?>" class="undr_cat_link">
                          <div class="undr_cat_tbl_hdr" align="center"><?php print $fetch_under_cat[1] ?></div>
                          <img src="cetagory_image/<?php print $fetch_under_cat[2]?>.jpg" height="130" width="100%" style="border-radius:0px 0px 10px 10px;">
                      </a>
                      </div>
					<?php
					}
				?>
                </div>
            </div>
            
            <div class="right">
                <?php
                    if(isset($_GET["page"]))
                    {
                        switch($_GET["page"])
                        {
                            case "about":
                            {
                                include("about_us.php");	
                            }
                            break;
                            
                            case "contact":
                            {
                                include("contact_us.php");	
                            }
                            break;
                            
                            case "feedback":
                            {
                                include("feedback.php");	
                            }
                            break;
                            
                            case "facility":
                            {
                                include("facility.php");	
                            }
                            break;
                            
                            case "ProductDetails":
                            {
                                include("ProductDetails.php");	
                            }
                            break;
							
							case "ItmAllPdct":
							{
								include("item_all_product.php");	
							}
							break;
							
							case "shoppingcard":
							{
								include("shopping_card.php");	
							}
							break;
							
							case "Order_from":
							{
								include("Order_from.php");	
							}
							break;
							
							case "invoice":
							{
								include("invoice.php");	
							}
							break;
                        }	
                    }
                    else
                    {
                        include("all_home_product.php");
                    }
                ?>
            </div>
        </div>
        <div class="footer">Footer</div>
    </div>
    
    
    
      <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
      <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
      <script type="text/javascript">
      $(window).load(function() {
          $('#slider').nivoSlider();
      });
      </script>
  </body>
  </html>