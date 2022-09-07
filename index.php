<?php
session_start();
$connection=mysql_connect('localhost','root','');
include_once("config.php");
$success="";
if(!$connection){
  die ('Could not connected'.mysql_error());
}
else{
mysql_select_db('lgt');
$id=rand(2,8);
 if(isset($_POST['send'])){
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$date= mktime();
$sql="INSERT INTO feadbacks (name,email,date,message) VALUES ('$name','$email','$date','$message')";
$snd=mysql_query($sql,$connection);
if ($snd) {
'<a href="#contact"></a>';
$success='<div style="color:green;font-weight:bolder;background-color:lightblue;font-size:18px" >Feedback sent successfull </div>';
}
else{
$success='<div style="color:green;font-weight:bolder;background-color:lightblue;font-size:18px" >Not successfull </div>'.mysql_error();
header("contact.php");
}
}
}

if(isset($_POST["add_to_cart"]))
 {
  if(isset($_SESSION["shopping_cart"]))
     {
      $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           if(!in_array($_GET["id"], $item_array_id))
           {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'             =>     $_GET["id"],
                     'item_name'           =>     $_POST["hidden_name"],
                     'item_model'          =>     $_POST["hidden_model"],
                     'item_availability'   =>     $_POST["hidden_avail"],
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_quantity'       =>     $_POST["quantity"],
                     'discription' => $_POST["hidden_specialorder"],
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else if(in_array($_GET["id"], $item_array_id))
           {    //$item_array[$_GET["id"]]=0;
         //session_unset($_SESSION["shopping_cart"][$_GET["id"]]);
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'             =>     $_GET["id"],
                     'item_name'           =>     $_POST["hidden_name"],
                     'item_model'          =>     $_POST["hidden_model"],
                     'item_availability'   =>     $_POST["hidden_avail"],
                     'item_price'          =>     $_POST["hidden_price"],
                     'item_quantity'       =>     $_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>window.location="index.php"</script>';
           }
      }
      else
      {
           $item_array = array(
                'item_id'             =>     $_GET["id"],
                'item_name'           =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'       =>     $_POST["quantity"],
                'item_availability'   =>     $_POST["hidden_avail"],
                'item_model'          =>     $_POST["hidden_model"]
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }


 if(isset($_GET["action"]))
 {
      if($_GET["action"] == "delete")
      {
           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
                if($values["item_id"] == $_GET["id"])
                {
                     unset($_SESSION["shopping_cart"][$keys]);
                     $success='Item Removed';
                     echo '<script>window.location="cart.php"</script>';
                }
           }
      }
 }





 /*if(isset($_GET["action"]))
 {
      if($_GET["action"] == "delete")
      {
           foreach($_SESSION["shopping_cart"] as $keys => $values)
           {
                if($values["item_id"] == $_GET["id"])
                {
                     unset($_SESSION["shopping_cart"][$keys]);
                     echo '<script>window.location="cart.php"</script>';
                }
           }
      }
  //  if($_GET["action"]=="update"){
      //foreach($_SESSION["shopping_cart"] as $keys => $values)
           //{
            //if(isset($_POST["item_quantity"]))
            //    {
          //      if(is_numeric($value)){
        //$_SESSION["shopping_cart"][$keys]["item_quantity"] = $value;
       //           echo '<script>window.location="cart.php"</script>';
     //           }
   //        }
///
   // }
 //}
     // if($_GET["action"]=="update"){
    //  if(isset($_POST["item_quantity"]) && is_array($_POST["item_quantity"])){
   // foreach($_POST["item_quantity"] as $keys => $values){
    //  if(is_numeric($values)){
     //   $_SESSION["shopping_cart"][$key]["product_qty"] = $values;
    //    echo '<script>window.location="cart.php"</script>';
    //  }
   // }
  ///}
 // }
 }*/

?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<?php include 'header.php'; ?>
<style type="text/css">
.back-to-top {
cursor: pointer;
position: fixed;
bottom: 0;
right: 20px;
display:none;
}
.back-to-top:hover {
cursor: pointer;
position: fixed;
bottom: 0;
right: 20px;
display:inline !important;
}
</style>
	<body class="no-trans">
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>
		<header class="header clearfix navbar navbar-fixed-top" style="background-color:black;height:90px;">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="header-left clearfix">
							<div class="logo smooth-scroll" style="margin-top:-7px;">
								<a href="#banner"><img id="logo" src="images/logo.PNG" alt="LGT"></a>
							</div>
							<div class="site-name-and-slogan smooth-scroll">
								<div class="site-name"><a href="#banner"><i style="font-family:Times New Roman,Times,serif">LGT</i></a></div>
								<div class="site-slogan">ላይ ጋይንት ጨርቃጨርቅ ፋብሪካ</div>
							</div>
						</div>
					</div>
					<div class="col-md-8" id="cssmenu">
						<div class="header-right clearfix">
							<div class="main-navigation animated">
								<nav class="navbar navbar-default" role="navigation">
									<div class="container-fluid">
										<div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
											<ul class="nav navbar-nav navbar-right">
												<li class="active"><a href="#banner">Home</a></li>
												<li class='active has-sub'><a href="#about">About us</a>
                          <ul>
                            <li><a href="background.php"><span  style="font-size:16px;font-family:Times New Roman,Times,serif">
                              Background And History</span></a></li>
                            <li><a href="company_workflow.php"><span  style="font-size:16px;font-family:Times New Roman,Times,serif">
                              Organizational Workfrlow</span></a></li>
                            <li><a href="missionvission.php"><span  style="font-size:16px;font-family:Times New Roman,Times,serif">
                              Mission And Vission</span></a></li>
                          </ul>
                        </li>
												<li><a href="#services">Products</a></li>
												<li><a href="#portfolio">Gallary</a></li>
												<li><a href="#clients">Clients</a></li>
												<li><a href="#contact">Contact</a></li>
												<li><a href="login.php">Log In</a></li>
	</ul></div></div></nav></div></div></div></div></div></header>
		<div id="banner" class="banner" style="margin-top:90px">
         <script type="text/javascript">
             jssor_1_slider_init = function() {
                 var jssor_1_SlideshowTransitions = [
                   {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                   {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
                 ];

                 var jssor_1_options = {
                   $AutoPlay: 1,
                   $Align: 0,
                   $SlideshowOptions: {
                     $Class: $JssorSlideshowRunner$,
                     $Transitions: jssor_1_SlideshowTransitions,
                     $TransitionsOrder: 1
                   },
                   $ArrowNavigatorOptions: {
                     $Class: $JssorArrowNavigator$
                   },
                   $ThumbnailNavigatorOptions: {
                     $Class: $JssorThumbnailNavigator$,
                     $Cols: 5,
                     $SpacingX: 5,
                     $SpacingY: 5,
                     $Align: 390
                   }
                 };
                 var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
                 var MAX_WIDTH = 1424;
                 function ScaleSlider() {
                     var containerElement = jssor_1_slider.$Elmt.parentNode;
                     var containerWidth = containerElement.clientWidth;
                     if (containerWidth) {
                         var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
                         jssor_1_slider.$ScaleWidth(expectedWidth);
                     }
                     else {
                         window.setTimeout(ScaleSlider, 30);
                     }
                 }
                 ScaleSlider();
                 $Jssor$.$AddEvent(window, "load", ScaleSlider);
                 $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                 $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
             };
         </script>
         <style>
             .jssorl-009-spin img {
                 animation-name: jssorl-009-spin;
                 animation-duration: 1.6s;
                 animation-iteration-count: infinite;
                 animation-timing-function: linear;
             }
             @keyframes jssorl-009-spin {
                 from {
                     transform: rotate(0deg);
                 }
                 to {
                     transform: rotate(360deg);
                 }
             }
             .jssora106 {display:block;position:absolute;cursor:pointer;}
             .jssora106 .c {fill:#fff;opacity:.3;}
             .jssora106 .a {fill:none;stroke:#000;stroke-width:350;stroke-miterlimit:10;}
             .jssora106:hover .c {opacity:.5;}
             .jssora106:hover .a {opacity:.8;}
             .jssora106.jssora106dn .c {opacity:.2;}
             .jssora106.jssora106dn .a {opacity:1;}
             .jssora106.jssora106ds {opacity:.3;pointer-events:none;}
             .jssort101 .p {position: absolute;top:0;left:0;box-sizing:border-box;background:#000;}
             .jssort101 .p .cv {position:relative;top:0;left:0;width:100%;height:100%;border:2px solid #000;box-sizing:border-box;z-index:1;}
             .jssort101 .a {fill:none;stroke:#fff;stroke-width:400;stroke-miterlimit:10;visibility:hidden;}
             .jssort101 .p:hover .cv, .jssort101 .p.pdn .cv {border:none;border-color:transparent;}
             .jssort101 .p:hover{padding:2px;}
             .jssort101 .p:hover .cv {background-color:rgba(0,0,0,6);opacity:.35;}
             .jssort101 .p:hover.pdn{padding:0;}
             .jssort101 .p:hover.pdn .cv {border:2px solid #fff;background:none;opacity:.35;}
             .jssort101 .pav .cv {border-color:#fff;opacity:.35;}
             .jssort101 .pav .a, .jssort101 .p:hover .a {visibility:visible;}
             .jssort101 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.6;}
             .jssort101 .pav .t, .jssort101 .p:hover .t{opacity:1;}
         </style>
         <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
             <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                 <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="images/spin.svg" />
             </div>
             <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:330px;overflow:hidden;">
                 <div>
                     <img data-u="image" src="images/banner.jpg" /></div>
                 <div>
                  <img data-u="image" src="images/slider/bg1.jpg" />
                  <div class="col-sm-12">
                  <div class="carousel-content centered">
                  <h2 style="margin-top: 100px;">
                  <span id="slid_font">Welcome To</span><br><br>
                  <span id="slid_font2">The Emerging Textile Company!</span></h2>
                  </div></div></div>
                 <div>
                     <img data-u="image" src="images/slider/bg3.jpg" />
                     <div class="col-sm-12">
                     <div class="carousel-content centered">
                  <h2 style="margin-top: 100px;">
                  <span id="slid_font">Welcome To</span><br><br>
                  <span id="slid_font2">The Emerging Textile Company!</span></h2>
                 </div></div></div>
                 <div>
                  <img data-u="image" src="images/slider/wplc2.jpg" />
                  <div class="col-sm-12">
                  <div class="carousel-content centered">
                  <h2 style="margin-top: 100px;">
                  <span id="slid_font">Welcome To</span><br><br>
                  <span id="slid_font2">The Emerging Textile Company!</span></h2>
                 </div></div></div>
                 <div>
                  <img data-u="image" src="images/slider/bg4.jpg" />
                  <div class="col-sm-12">
                  <div class="carousel-content centered">
                  <h2 style="margin-top: 100px;">
                  <span id="slid_font">Welcome To</span><br><br>
                  <span id="slid_font2">The Emerging Textile Company!</span></h2>
                 </div></div></div>
             </div>
         </div>
         <script type="text/javascript">jssor_1_slider_init();</script>
      </div>
		<div class="section clearfix object-non-visible" data-animation-effect="fadeIn" style="margin-top: 120px">
			<div class="container" style="margin-top: 1px">
				<div class="row">
					<div class="col-md-12">
						<h1 id="about" class="title text-center"><span style="color:black;font-family:Times New Roman,Times,serif;">
              About <span>North Gaynt Textile Share Company</span></h1>
<div class="container object-non-visible" data-animation-effect="fadeIn">
<div class="tab-content">
        <div class="col-xs-12">
						<p class="lead text-center"></p>
						<div class="space"></div>
						<div class="row">
							<div class="col-md-6">
								<img src="images/backgrnd.jpg" alt="">

							</div>
							<div class="col-md-6">
								<p>North Gaynt Textile Share company is Located in Ethiopia,Amhara Region,South Gondar Zone,Gaynt Town which is 170 Km from the regional capital city Bahir Dar</p>
								<p>The company is the leading garment and textile factory in the zone, its main outputs are prepared from the row material coton collected around the town.</p><p> <strong><i>Main Products include</i></strong></p>
								<ul class="list-unstyled">
									<li class="list"><i class="fa fa-caret-right pr-10 text-colored"></i>Bed Sheets,Pillow Cases,Flat Sheet</li>
									<li class="list"><i class="fa fa-caret-right pr-10 text-colored"></i> Garment products</li>
									<li class="list"><i class="fa fa-caret-right pr-10 text-colored"></i> Processed Cotons</li>
									<li class="list"><i class="fa fa-caret-right pr-10 text-colored"></i> Yarns</li>
									<li class="list"><i class="fa fa-caret-right pr-10 text-colored"></i>Traditional Cotton cloths </li>
					</ul></div></div></div></div>
  </div></div></div></div></div> </div></div>
		<div>
			<div class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="services"  class="text-center title">Our Products</h1>

  <?php
 $result = mysql_query("SELECT * FROM product ORDER BY id ASC");
                if(mysql_num_rows($result) > 0)
               {
                     while($row = mysql_fetch_array($result))
                     {
                ?>
<div class="col-xs-3 no-left-right" style="margin-bottom: 20px; ">
<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
<?php
if($row["id"]==1){?>
<a href="threads.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==2) {?>
<a href="kuta.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==3) {?>
<a href="bedsheet.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==4) {?>
<a href="abushema.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==5) {?>
<a href="abujedie.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==6) {?>
<a href="pillow.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else if($row["id"]==7) {?>
<a href="rowtextile.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php
}
else{?>
 <a href="rowtextile.php"><img id="img_size" src="images/product/<?php echo $row["Image"]; ?>" class="img-responsive"/></a>
<?php 
}
?>
            <p class="text_align"><?php echo $row["Product_Name"]; ?></p>
            <p class="text_align">Price: <?php echo $row["Price"]; ?></p>
             <!--p> <a href="threads.php"><img src="images/download.jpg" style="width:50px;height:10px" /></a-->
            </p>
  <input type="hidden" name="quantity"  value="1" />
  <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />
  <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />
   <input type="hidden" name="hidden_model" value="
   <?php echo $row["Product_Model"]; ?>" />
  <input type="hidden" name="hidden_avail" value="
  <?php echo $row["Availability"]; ?>" />

  <input type="hidden" name="hidden_specialorder" value="No Special Order" />

  <input class="wl_btn" type="submit" name="add_to_cart" style="margin-top:5px;"  value="Add to Cart" />
<?php
if($row["id"]==1){?>
  <a href="threads.php"><img src="images/download.jpg" class="detail_align" style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==2){?>
<a href="kuta.php"><img src="images/download.jpg" class="detail_align"
 style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==3){?>
<a href="bedsheet.php"><img src="images/download.jpg" class="detail_align"
  style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==4){?>
<a href="abushema.php"><img src="images/download.jpg" class="detail_align"
  style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==5){?>
<a href="abujedie.php"><img src="images/download.jpg" class="detail_align"
 style="width:50px;height:10px" /></a>
<?php }
else if($row["id"]==6){?>
<a href="pillow.php"><img src="images/download.jpg" class="detail_align"
 style="width:50px;height:10px" /></a>
<?php
}
else if($row["id"]==7){?>
<a href="rowtextile.php"><img src="images/download.jpg" class="detail_align"
  style="width:50px;height:10px" /></a>
<?php
}
else{?>
  <a href="rowtextile.php"><img src="images/download.jpg" class="detail_align"
  style="width:50px;height:10px" /></a><?php
}
?>
</form>
                </div>
                <?php
                     }
              }
                ?>
<div style="text-align:right;margin-top:400px;margin-right:30px">
<a href="cart_login.php" class="button">Check Your Cart
<img style="margin-left:20px" src="images/shoppingcart.png"/></a>
</div></span>
<!--div class="col-xs-4">
      <div><a href="threads.php">
          <img id="img_size" src="images/thread/thread1.jpg" alt="">
            <p class="text_align"><b>Yarn  (ክር)</b></p></a>
            <p class="text_align">$0.00 Ex Tax: $0.00</p>
          <a  title="thread" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
            <a href="cart_login.php"><button class="order_btn">Add To Cart</button></a>
            <a href="threads.php"><button class="wl_btn">Details</button></a>
      </div>
</div--></div></div></span>
		<div class="default-bg blue">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h4 class="text-center">Let's Work Together!</h4>
					</div></div></div></div>
		<div class="section">
			<div class="container">
				<h1 class="text-center title" id="portfolio">Gallery</h1>
				<div class="separator"></div>
				<p class="lead text-center">Images from our factory and our products</p>
				<div class="row object-non-visible" data-animation-effect="fadeIn">
					<div class="col-md-12">
						<div class="filters text-center">
							<ul class="nav nav-pills">
								<li class="active"><a href="#" data-filter="*">All</a></li>
								<li><a href="#" data-filter=".web-design">Work Place</a></li>
								<li><a href="#" data-filter=".app-development">Process</a></li>
								<li><a href="#" data-filter=".site-building">Products</a></li>
							</ul>
						</div>
					<div class="isotope-container row grid-space-20">
							<div class="col-sm-3 col-md-2 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc1a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-1">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a></div>
								<a class="btn btn-default btn-block" data-toggle="modal"
									data-target="#project-3">Belopener</a>
										</div>
							<div class="modal fade" id="project-1" tabindex="-1" role="dialog" aria-labelledby="project-1-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-8">
														<p>Description</p>
													</div>
													<div class="col-md-4">
														<img src="images/wplace/wplc1.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>

							<div class="col-sm-2 col-md-2 isotope-item app-development">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/process/pr1s.jpg">
										<a class="overlay" data-toggle="modal" data-target="#project-2">
											<i class="fa fa-search-plus"></i>
											<span>Process</span>
										</a>
									</div>
                  <a class="btn btn-default btn-block" data-toggle="modal"
									data-target="#project-3">Row Cotton</a></div>
								<div class="modal fade" id="project-2" tabindex="-1" role="dialog" aria-labelledby="project-2-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
												<h4 class="modal-title" id="project-2-label">Row Cotton</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-8">
														<p>Description</p>
													</div>
													<div class="col-md-4">
														<img src="images/process/pr1.jpg" alt="">
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>



<div class="col-sm-3 col-md-2 isotope-item site-building">
                <div class="image-box">
                  <div class="overlay-container">
                    <img src="images/product/pillow4a.jpg">
                    <a class="overlay" data-toggle="modal" data-target="#project-10">
                      <i class="fa fa-search-plus"></i>
                      <span>Products</span>
                    </a>
                  </div>
                  <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-10">Pillow Case</a>
                </div>
                <div class="modal fade" id="project-10" tabindex="-1" role="dialog" aria-labelledby="project-10-label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p>Description</p>
                          </div>
                          <div class="col-md-6">
                            <img src="images/pillow/pillow4.jpg">
                          </div></div></div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div></div></div></div></div>


							<div class="col-sm-3 col-md-2 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc4a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-3">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-3">Calder</a>
								</div>
								<div class="modal fade" id="project-3" tabindex="-1" role="dialog" aria-labelledby="project-3-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-8">
														<p>Description</p>
													</div>
													<div class="col-md-4">
														<img src="images/wplace/wplc4.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
										     </div></div></div></div></div>
							<div class="col-sm-3 col-md-2 isotope-item site-building">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/product/prd4a.jpg">
										<a class="overlay" data-toggle="modal" data-target="#project-4">
											<i class="fa fa-search-plus"></i>
											<span>Products</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-4">Abujedie</a>
								</div>
								<div class="modal fade" id="project-4" tabindex="-1" role="dialog" aria-labelledby="project-4-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
														<img src="images/product/prd4.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-3 col-md-2 isotope-item app-development">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/process/pr2s.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-5">
											<i class="fa fa-search-plus"></i>
											<span>Process</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-5">Weaving The Cotton</a>
								</div>
								<div class="modal fade" id="project-5" tabindex="-1" role="dialog" aria-labelledby="project-5-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-4">
														<img src="images/process/pr2.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-3 col-md-2 isotope-item site-building">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/product/prd3n.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-7">
											<i class="fa fa-search-plus"></i>
											<span>Products</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-7">Processed Cotton</a>
								</div>
								<div class="modal fade" id="project-7" tabindex="-1" role="dialog" aria-labelledby="project-7-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-4">
													<img src="images/product/prd3.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>

<div class="col-sm-3 col-md-2 isotope-item site-building">
                <div class="image-box">
                  <div class="overlay-container">
                    <img src="images/product/kuta1a.jpg">
                    <a class="overlay" data-toggle="modal" data-target="#project-10">
                      <i class="fa fa-search-plus"></i>
                      <span>Products</span>
                    </a>
                  </div>
                  <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-10">Kuta (ኩታ)</a>
                </div>
                <div class="modal fade" id="project-10" tabindex="-1" role="dialog" aria-labelledby="project-10-label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p>Description</p>
                          </div>
                          <div class="col-md-4">
                            <img src="images/kuta/kuta1.jpg">
                          </div></div></div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div></div></div></div></div>
<div class="col-sm-3 col-md-2 isotope-item app-development">
                <div class="image-box">
                  <div class="overlay-container">
                    <img src="images/process/pr7s.jpg" alt="">
                    <a class="overlay" data-toggle="modal" data-target="#project-12">
                      <i class="fa fa-search-plus"></i>
                      <span>Process</span>
                    </a>
                  </div>
                  <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-12">Output Garment</a>
                </div>
                <div class="modal fade" id="project-12" tabindex="-1" role="dialog" aria-labelledby="project-12-label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p>Description</p>
                          </div>
                          <div class="col-md-4">
                            <img src="images/process/pr7.jpg">
                          </div></div></div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div></div></div></div></div>
							<div class="col-sm-3 col-md-2 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc6a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-8">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-8">Spinner</a>
								</div>
								<div class="modal fade" id="project-8" tabindex="-1" role="dialog" aria-labelledby="project-8-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<h3>Project Description</h3>
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-4">
													<img src="images/wplace/wplc6.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
<div class="col-sm-2 col-md-2 isotope-item app-development">
                <div class="image-box">
                  <div class="overlay-container">
                    <img src="images/process/pr4s.jpg" alt="">
                    <a class="overlay" data-toggle="modal" data-target="#project-12">
                      <i class="fa fa-search-plus"></i>
                      <span>Process</span>
                    </a>
                  </div>
                  <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-12">Spinning</a>
                </div>
                <div class="modal fade" id="project-12" tabindex="-1" role="dialog" aria-labelledby="project-12-label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p>Description</p>
                          </div>
                          <div class="col-md-4">
                            <img src="images/process/pr4.jpg">
                          </div></div></div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div></div></div></div></div>
							<div class="col-sm-3 col-md-2 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc3a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-9">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-9">Work Area</a>
								</div>
								<div class="modal fade" id="project-9" tabindex="-1" role="dialog" aria-labelledby="project-9-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<h3>Project Description</h3>
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-4">
													<img src="images/wplace/wplc3.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
							<div class="col-sm-3 col-md-2 isotope-item site-building">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/product/bedsheet1a.png">
										<a class="overlay" data-toggle="modal" data-target="#project-10">
											<i class="fa fa-search-plus"></i>
											<span>Products</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-10">Bed sheet</a>
								</div>
								<div class="modal fade" id="project-10" tabindex="-1" role="dialog" aria-labelledby="project-10-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-4">
														<img src="images/bedsheet/bedsheet1.png">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
<div class="col-sm-3 col-md-2 isotope-item app-development">
                <div class="image-box">
                  <div class="overlay-container">
                    <img src="images/process/pr6s.jpg" alt="">
                    <a class="overlay" data-toggle="modal" data-target="#project-12">
                      <i class="fa fa-search-plus"></i>
                      <span>Process</span>
                    </a>
                  </div>
                  <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-12">Garmenting</a>
                </div>
                <div class="modal fade" id="project-12" tabindex="-1" role="dialog" aria-labelledby="project-12-label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p>Description</p>
                          </div>
                          <div class="col-md-4">
                            <img src="images/process/pr6.jpg">
                          </div></div></div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div></div></div></div></div>
<div class="col-sm-3 col-md-2 isotope-item site-building">
                <div class="image-box">
                  <div class="overlay-container">
                    <img src="images/product/thread2a.jpg">
                    <a class="overlay" data-toggle="modal" data-target="#project-10">
                      <i class="fa fa-search-plus"></i>
                      <span>Products</span>
                    </a>
                  </div>
                  <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-10">Yarn</a>
                </div>
                <div class="modal fade" id="project-10" tabindex="-1" role="dialog" aria-labelledby="project-10-label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p>Description</p>
                          </div>
                          <div class="col-md-4">
                            <img src="images/thread/thread2.jpg">
                          </div></div></div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div></div></div></div></div>

							<div class="col-sm-3 col-md-2 isotope-item web-design">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/wplace/wplc2a.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-11">
											<i class="fa fa-search-plus"></i>
											<span>Work Place</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-11">Garmenting Area</a>
	      </div><div class="modal fade" id="project-11" tabindex="-1" role="dialog" aria-labelledby="project-11-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-6">
													<img src="images/wplace/wplc2.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div>
                      <div class="col-sm-3 col-md-2 isotope-item app-development">
                <div class="image-box">
                  <div class="overlay-container">
                    <img src="images/process/pr5s.jpg" alt="">
                    <a class="overlay" data-toggle="modal" data-target="#project-12">
                      <i class="fa fa-search-plus"></i>
                      <span>Process</span>
                    </a>
                  </div>
                  <a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-12">OutPut Yarn</a>
                </div>
                <div class="modal fade" id="project-12" tabindex="-1" role="dialog" aria-labelledby="project-12-label" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <p>Description</p>
                          </div>
                          <div class="col-md-4">
                            <img src="images/process/pr5.jpg">
                          </div></div></div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                      </div></div></div></div></div>
							<div class="col-sm-3 col-md-2 isotope-item app-development">
								<div class="image-box">
									<div class="overlay-container">
										<img src="images/process/pr3s.jpg" alt="">
										<a class="overlay" data-toggle="modal" data-target="#project-12">
											<i class="fa fa-search-plus"></i>
											<span>Process</span>
										</a>
									</div>
									<a class="btn btn-default btn-block" data-toggle="modal" data-target="#project-12">Cardlling</a>
								</div>
								<div class="modal fade" id="project-12" tabindex="-1" role="dialog" aria-labelledby="project-12-label" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<p>Description</p>
													</div>
													<div class="col-md-4">
														<img src="images/process/pr3.jpg">
													</div></div></div>
											<div class="modal-footer">
												<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
											</div></div></div></div></div></div>
					</div></div></div></div>
		<div class="section translucent-bg bg-image-2 pb-clear">
			<div class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="clients" class="title text-center">Clients</h1>
				<div class="space"></div>
				<div class="row">
					<div class="col-md-4">
						<div class="media testimonial">
							<div class="media-left">
								<img src="images/testimonial-1.png" alt="">
							</div>
							<div class="media-body">
								<h3 class="media-heading">You are Amazing!</h3>
							<blockquote>
								<p>Hey guys u have amazing products</p>
								<footer>Abebaw<cite title="Source Title"></cite></footer>
							</blockquote></div></div></div>
					<div class="col-md-4">
						<div class="media testimonial">
							<div class="media-left">
								<img src="images/testimonial-1.png" alt="">
							</div>
							<div class="media-body">
								<h3 class="media-heading">Best!</h3>
								<blockquote>
									<p>It is best website ever </p>
									<footer>Andargachew <cite title="Source Title"></cite></footer>
								</blockquote></div></div></div>
					<div class="col-md-4">
						<div class="media testimonial">
							<div class="media-left">
								<img src="images/testimonial-3.png" alt="">
							</div>
							<div class="media-body">
								<h3 class="media-heading">Thank You!</h3>
							<blockquote>
								<p>Thank you for your deliveries</p>
								<footer>Marcus <cite title="Source Title"></cite></footer>
							</blockquote>
							</div></div></div></div></div></div>
		<footer id="footer">
			<div class="footer section">
				<div class="container">
					<h1 class="title text-center" id="contact">Contact Us</h1>
					<div class="space"></div>
					<div class="row">
						<div class="col-sm-6">
							<div class="footer-content">
								<p class="large" style="font-family:Times New Roman,Times,serif;margin-left:50px;"><strong><i>Contact Information</i></strong></p>
					<ul class="list-icons">
						<li><i class="fa fa-map-marker pr-10"></i>Address:
						 <i class="fa fa-map-marker pr-10"></i>Gaynt Town,Amhara Ethiopia</li>
						<li><i class="fa fa-map-marker pr-10"></i>Mail: corporate@laygaynttextile.com</li>
						<li><i class="fa fa-phone pr-10"></i>Mobile: General Manager +2515823434</li>
					    <li><i class="fa fa-fax pr-10"></i>Phone: +2515823435</li>
								</ul>
</div></div>
						<div class="col-sm-6">
							<div class="footer-content">
								<form role="form" id="footer-form" action="index.php" method="post">
									<div class="form-group has-feedback">
							<div style="margin-right:60px;text-align: center;height:40px">
   				            <ul class="nav navbar-nav navbar-right">
                        <li><a href="#contact"></a></li></ul>
                      <?php echo $success;
                      ?>
				            </div>
										<label class="sr-only" for="name2">Name</label>
										<input type="text" class="form-control" id="name2" placeholder="Name" name="name" required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="email2">Email address</label>
										<input type="email" class="form-control" id="email2" placeholder="Enter email" name="email" required>
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="message2">Message</label>
										<textarea class="form-control" rows="8" id="message2" placeholder="Message" name="message" required></textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<button type="submit"  name="send" value="Send" class="btn btn-default">SEND</button>
								</form>
              </div></div>
                <!-- BACK TOP TOP BUTTON -->






<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Back to Top" data-toggle="tooltip" data-placement="top">
  <span class="glyphicon glyphicon-chevron-up"></span>
</a>
























                <div id="back-to-top" data-spy="affix" data-offset-top="200" class="back-to-top hidden-xs hidden-sm affix-top">
                  <button class="btn btn-primary" title="Back to Top"><i class="icon-arrow-up fa fa-angle-double-up"></i></button>
                </div>

                <script type="text/javascript">
                (function($) {
                  // Back to top
                  $('#back-to-top').on('click', function(){
                    $("html, body").animate({scrollTop: 0}, 500);
                    return false;
                  });
                })(jQuery);
                </script>
                <!-- BACK TO TOP BUTTON -->


              </div></div></div>
								<?php include 'footer.php'; ?>
	</body>
</html>
