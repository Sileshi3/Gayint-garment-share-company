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
                echo '<script>window.location="threads.php"</script>';  
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
					<h3 id="services"  class="text-center title">Threads  (ክር)</h3>
	 		       <div>
							 <div class="w3-content w3-section" style="max-width:550px;padding-left: 0px;height:100%">
							   <img class="mySlides" src="images/thread/thread1.jpg" style="width:100%">
							   <img class="mySlides" src="images/thread/thread2.jpg" style="width:100%">
							   <img class="mySlides" src="images/thread/thread3.jpg" style="width:100%">
								 <img class="mySlides" src="images/thread/thread4.jpg" style="width:100%">
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
	<?php 
  $result = mysql_query("SELECT * FROM product WHERE id=1 ORDER BY id ASC");
                if(mysql_num_rows($result) > 0)  
               {  
                     while($row = mysql_fetch_array($result))  
                     {  
                ?> 
      <div class="col-xs-4 no-left-right" style="margin-bottom: 40px; ">
<form method="post" action="threads.php?action=add&id=<?php echo $row["id"]; ?>">
	<input type="hidden" name="hidden_name" value="<?php echo $row["Product_Name"]; ?>" />
  <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" /> 
   <input type="hidden" name="hidden_model" value="
   <?php echo $row["Product_Model"]; ?>" />
  <input type="hidden" name="hidden_avail" value="
  <?php echo $row["Availability"]; ?>" />
  <input class="wl_btn" type="submit" name="add_to_cart" style="margin-top:5px;"  value="Add to Cart" />
<?php }
}?> 
	 		       </div>
	 		  </div>
<div style="margin-left:300px;">
<h5><b>Availability: In Store</b></h5>
<hr>
<b><h4>Price:Negotiable</h4></b><p>(Discount for large orders)</p><hr>
<h4>Available Colors:</h4>
<select type="text" name="SelectColor" style="font-size: 16px margin-top:20px margin-top:40px">
<option  >--Please Select Color--</option>
<option value="Red">Red</option>
<option value="Green">Green</option>
<option value="Black">Black</option>
<option value="White">White</option>
<option value="Yellow">Yellow</option>
<option value="Blue">Blue</option>
<option value="Light Blue">Light Blue</option>
<option value="Pink">Pink</option>
<option value="Purple">Purple</option>
<option value="Grey">Grey</option></select>
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
</div>





</form></div>


<div class="tab-pane" id="description" style="width:100%">
	<div class="discription">The treads are really awosome and good quality which can be used in different type of materials
</div>
</div>
<div class="tab-pane" id="review" style="width:100%">
	<div class="review">
		<p>Write a review about the product</p>
		<textarea class="form-control" rows="3" id="message2" placeholder="Review" name="review" required></textarea>
</div>
</div>
</div>
</div></div>
<?php include 'footer.php'; ?>
</body>
</html>
