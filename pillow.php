<?php
session_start(); 
include 'connect.php'; 
$success='';
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
                     'discription'=>$_POST["discription"],
                     'SelectColor'=>$_POST["SelectColor"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;
                $success='<div class="alert alert-success alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   <b style="margin-left:350px">Item Added to cart successfully.</b></div>';   
           }  
           else if(in_array($_GET["id"], $item_array_id))  
           { 
                 $success='<div class="alert alert-danger alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b style="margin-left:350px">Item is already in your cart.</b></div>';   
           }  
           else  
           {     
                echo '<script>window.location="pillow.php"</script>';  
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
                'item_model'          =>     $_POST["hidden_model"],
                'discription'=>$_POST["discription"],
                'SelectColor'=>$_POST["SelectColor"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }


if(isset($_POST["ordernow"]))  
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
                     'discription'=>$_POST["discription"],
                     'SelectColor'=>$_POST["SelectColor"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array; 
                echo '<script>window.location="cart_login.php"</script>'; 
           }  
           else if(in_array($_GET["id"], $item_array_id))  
           {    echo '<script>window.location="cart_login.php"</script>';  
           }  
           else  
           {     
               echo '<script>window.location="cart_login.php"</script>';  
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
                'item_model'          =>     $_POST["hidden_model"],
                'discription'=>$_POST["discription"],
                'SelectColor'=>$_POST["SelectColor"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array; 
           echo '<script>window.location="cart_login.php"</script>'; 
      }  
 }
 ?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<?php include 'header.php'; ?>
	<?php include 'nav.php';?>
	<style>
.mySlides {display:none;},
.mySlidesnn {display:none;}
</style>
<div class="container object-non-visible" data-animation-effect="fadeIn">
<?php echo $success;?>
	<ul class="nav nav-tabs" style="margin-left:300px;margin-bottom:20px">
			<li style="font:bold;font-family:Times New Roman,Times,serif;font-size:18px" class="active">
				<a href="#order" data-toggle="tab">Product Detail</a></li>
			<li style="font:bold;font-family:Times New Roman,Times,serif;font-size:18px" class="">
				<a href="#description" data-toggle="tab">Description</a></li>
			<li style="font:bold;font-family:Times New Roman,Times,serif;font-size:18px" class="">
					<a href="#review" data-toggle="tab">Reviews</a></li>
	</ul>
<div class="tab-content">
<div class="tab-pane fade active in" id="order" style="width:100%">
	<div class="col-xs-4">
		<h3 id="services"  class="text-center title">Pillow Case  (የትራስ ጨርቅ)</h3>
			 <div>
				 <div class="w3-content w3-section" style="max-width:550px;padding-left: 0px;height:40%">
					 <img class="mySlides" src="images/pillow/pillow1.jpg" style="width:100%">
					 <img class="mySlides" src="images/pillow/pillow2.jpg" style="width:100%">
					 <img class="mySlides" src="images/pillow/pillow3.jpg" style="width:100%">
					 <img class="mySlides" src="images/pillow/pillow4.jpg" style="width:100%">
					 <img class="mySlides" src="images/pillow/pillow5.png" style="width:100%">
				 </div>
				 <script>
				 var myIndex = 0;
				 carousel();
				 function carousel() {
						 var i;
						 var x = document.getElementsByClassName("mySlides");
						 for (i = 0; i < x.length; i++) {
								x[i].style.display = "none";
						 }
						 myIndex++;
						 if (myIndex > x.length) {myIndex = 1}
						 x[myIndex-1].style.display = "block";
						 setTimeout(carousel, 2000); // Change image every 2 seconds
				 }
				</script></div>
	<?php $result = mysql_query("SELECT * FROM product WHERE Product_Model='lgt007'");
                if(mysql_num_rows($result) > 0)  
               {  
                     while($row = mysql_fetch_array($result))  
                     {  
                ?> 
      <div class="col-xs-4 no-left-right" style="margin-bottom: 40px; ">
<form method="post" action="pillow.php?action=add&id=<?php echo $row["id"]; ?>">
  <input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />
  <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" /> 
   <input type="hidden" name="hidden_model" value="
   <?php echo $row["Product_Model"]; ?>" />
  <input type="hidden" name="hidden_avail" value="
  <?php echo $row["Availability"]; ?>" />
  <input class="wl_btn" type="submit" name="add_to_cart" value="Add to Cart" />
<?php }
}?> 
	 		       </div>
	 		  </div>
<div style="margin-left:300px;">
<h5>Availability: In Store</h5>
<b><h5>Weight: light weight</h5></b>
<hr>
<b><h4>Price: Negotiable</h4></b><p>(Discount for large orders)</p><hr>
<h4>Available Colors:</h4>
<select type="text" name="SelectColor" style="font-size: 16px margin-top:20px margin-top:40px">
<option value="Red">--Please Select Color--</option>
<option value="Red">Red</option>
<option value="Black">Black</option>
<option value="White">White</option>
<option value="Blue">Blue</option></select><hr>
<b><h4>Quantity:
<input type="text" name="quantity"  value="1" /></h4><hr>
<p>Special Order(if you need write it here)</p>
<textarea type="text" name="discription"></textarea>
<button class="big_order_btn" type="submit" name="ordernow"
>Order Now</button></h4></b>  
 <div style="text-align:right;margin-top:1px;margin-right:300px">
<a href="cart_login.php" class="button">Check Your Cart
<img style="margin-left:20px" src="images/shoppingcart.png"/></a>
</div>
</div></form></div>
<div class="tab-pane" id="description" style="width:100%">
<div class="discription">
	<div class="tab-pane active" id="description" style="text-align: justify;font-family: 'times new roman', times;">
		<p><p><strong>Pillow case</strong></p>
<p>Product description<br />Construction:20*20/60*60<br />Warp count: 20s<br />Weft count: 20s<br />Ends/inch: 60<br />
	Picks/inch: 60<br />GSM: 154<br />Thread count:120/inch2</p>
<p><strong><i>Large size :</i></strong>
 Pillow case width: 70cm, Length:100cm<br />
<p><strong><i>midium size</i></strong>
 Pillow case width: 50cm, Llength:70cm<br />
<p><strong><i>small size</i></strong>
 Pillow case width: 45cm, Length:50cm<br />
<p><ul style="list-style:none;"><strong>Key features</strong>
	<li class="list">Cotton feels soft and nice against your skin</li>
	<li class="list">Plain woven pillow case cotton is very soft and pleasant to sleep in, and has a pronounced luster that makes it look beautiful on your bed.</li>
	<li class="list">Cotton cellulose keeps you dry and comfortable all through the night, because it absorbs and transports moisture away and helps your body maintain a comfortable, even temperature.</li></ul>
<p><strong>People &amp; Planet</strong><br />All the cotton in our products comes from more sustainable sources. This means that the cotton is either recycled, or grown with less water, less fertilizers and less pesticides, while increasing profit margins for the farmers,renewable material (cotton).<br />
<ul style="list-style:none;"><p><strong>Care instructions</strong></p>
	<li class="list">Machine wash, hot 140&deg;F (60&deg;C).</li>
	<li class="list">Close the zipper before washing.</li>
	<li class="list">Tumble dry, normal.</li>
  <li class="list">Do not dry clean.</li></ul>
	<strong>Product description :100 % cotton</strong>
	</div>
</div>
</div>
<div class="tab-pane" id="review" style="width:100%">
<div class="review">
<p>Write a review about the product</p>
<textarea class="form-control" rows="3" id="message2" placeholder="Review" name="review" required></textarea>
</div>
</div>
</div>
</div></div></div>
	</div><?php include 'footer.php'; ?>
</body>
</html>
