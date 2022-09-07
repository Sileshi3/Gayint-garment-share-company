<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>
<h1 align="center">View Cart</h1>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0">
<?php
echo '<table  class="table table-striped table-bordered table-hover" id="dataTables-example">'.
                                '<thead>'.
                                    '<tr>'.
                                        '<th>'.'No'.'</th>'.
                                        '<th>'.'Quty'.'</th>'.
                                        '<th>'.'Image'.'</th>'.
                                        '<th>'.'Product Name'.'</th>'.
                                        '<th>'.'Product Model'.'</th>'.
                                        '<th>'.'Availability'.'</th>'.
                                        '<th>'.'Price'.'</th>'.
                                        '<th>'.'Order'.'</th>'.
                                        '<th>'.'Remove'.'</th>'.
                                     '</tr>'.
                                '</thead>';
   
 	
	if(isset($_SESSION["cart_products"])) //check session var
    { 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			//set variables to use in content below
			$product_id = $cart_itm["id"];
			$product_qty = $cart_itm["product_qty"];
			$product_name = $cart_itm["Product_Name"];
			$product_img = $cart_itm["Image"];
			$product_price = $cart_itm["Price"];
			$product_code = $cart_itm["Product_Model"];
			$product_color = $cart_itm["Availability"];
		    echo '<tr>';
		    echo '<td>'.$product_id.'</td>';
			echo '<td><input type="text" size="2" maxlength="2" 
			name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';?> 
			 <td><img src="images/product/<?php echo $product_img; ?>"/></td><?php
			echo '<td>'.$product_name.'</td>';
			echo '<td>'.$product_code.'</td>';
			echo '<td>'.$product_color.'</td>';
			echo '<td>'.$product_price.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
		
        }
	}
    ?>
    
    <tr><td colspan="5"><a href="index.php" class="button">Add More Items</a>
    	<button type="submit">Update</button></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

</body>
</html>
