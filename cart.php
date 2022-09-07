<?php
include 'session.php';
$usr=$_SESSION['customer'];
include("connect.php");
   $sql = mysql_query("SELECT * FROM lgt.customer WHERE Customer_ID='$usr'");
  $session=mysql_fetch_object($sql);
if(isset($_POST['ordr_later'])){
  if(!empty($_SESSION["shopping_cart"]))
                          {
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                               {
  $id=$values["item_id"];
  $name=$values["item_name"];
  $model=$values["item_model"];
  $qty=$values["item_quantity"];
  $prc=$values["item_price"];
  $avai=$values["item_availability"];
  $spe_order=$values["discription"];
  $session_ci=$session->Customer_ID;
  $session_un=$session->UserName;
  $session_pw=$session->Password;
  mysql_select_db('lgt');
$sql="INSERT into cart(Customer_Id,Product_Id,Product_Name,Product_Model,Price,Availability,Amount,SpecialOrder,Username,Password ) VALUES ('$session_ci','$id','$name','$model','$prc','$avai','$qty','$spe_order','$session_un',
'$session_pw');";
$insert=mysql_query($sql);
}
if($insert){
'<div class="alert alert-danger alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>
                    If you are new customer please REGISTER and if you have account please Login.
                  </div>';
    $success='<div class="alert alert-success alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>Dear Customer You Can Order Products Later.</div>';
      header("cart.php");
    }else{
         $success='<div class="alert alert-danger alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>Could Not Stored in Your Cart</div>'.mysql_error();
        header("cart.php");
    }
 }
 }
 if(isset($_POST['ordr_now'])){
  $sql = mysql_query("SELECT * FROM lgt.customer WHERE Customer_ID='$usr'");
  $customer_info=mysql_fetch_object($sql);
    if(!empty($_SESSION["shopping_cart"]))
                          {
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                               {
  $id=$values["item_id"];
  $item_name=$values["item_name"];
  $model=$values["item_model"];
  $spe_order=$values["discription"];

if(isset($_POST["product_qty"]))
{
  if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
    foreach($_POST["product_qty"] as $key => $value){
      if(is_numeric($value)){
        $_SESSION["shopping_cart"][$key]["product_qty"] = $value;
        $qty=$value;
      }
    }
  }
}
else{$qty=$values["item_quantity"];}
  $fname=$customer_info->FullName;
  $cname=$customer_info->CompanyName;
  $Phone=$customer_info->Phone;
  $Email=$customer_info->Email;
  mysql_select_db('lgt');
$sql="INSERT into orders (FullName,CompanyName,Phone,Email,Product_Id,Product_Name,Product_Model,Quantity,SpecialOrder) VALUES ('$fname','$cname','$Phone','$Email','$id','$item_name','$model','$qty','$spe_order');";
$insert=mysql_query($sql);
}
if($insert){
    $success='<div style="margin-left:70px;margin-right:70px;" class="alert alert-success alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>Dear Customer Your  Order Have Been Accepted Successfully,We Will Contact You Soon.</div>';
      header("cart.php");
    }else{
         $success='<div style="margin-left:200px" class="alert alert-danger alert-dismissable">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>Could Not Receive Your Orders,Please Try Again.</div>'.mysql_error();
        header("cart.php");
    }
 }
 }
if(isset($_POST["product_qty"]))
{
  if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
    foreach($_POST["product_qty"] as $key => $value){
      if(is_numeric($value)){
        $_SESSION["shopping_cart"][$key]["product_qty"] = $value;
      }
    }
  }
}
 if(isset($_GET["action"]))
 {
      if($_GET["action"] == "update")
      {
           foreach($_SESSION["shopping_cart"] as $keys => $value)
           {
                if($value["item_id"] == $_GET["id"])
                {
                         if(is_numeric($value)){
        $_SESSION["shopping_cart"][$key]["product_qty"] = $value;
      }
                }
           }
      }
 }
 mysql_close($link)
?>
<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<?php include 'header.php'; ?>
	<?php include 'nav.php';?>
<div style="text-align: right;font-size:20px;margin-top: 1px;margin-right:80px; font-family:Times New Roman,Times,serif">
    <?php echo $session->UserName;?>
<span style="text-align: right;font-size:20px;margin-left: 30px;margin-right:10px">
        <a href="logout.php">Log out</a></span>
    </div>
	<div class="container object-non-visible" data-animation-effect="fadeIn">
				<h1 id="services"  class="text-center title">My Cart</h1>
          <?php
    if(isset($_POST['ordr_later'])){
      echo $success;}
      else if(isset($_POST['ordr_now'])){
        echo $success;}
        ?>
<div class="panel-body">
   <div style="clear:both"></div><br />
                <div class="table-responsive" style="font-family:Times New Roman,Times,serif"">
                     <table class="table table-bordered">
                          <tr> <th>Product Id</th>
                               <th>Item Name</th>
                               <th>Item Code</th>
                               <th>Quantity</th>
                               <th>Price</th>
                               <th>Available</th>
                               <th>Special Order</th>
                               <th>Action</th>
                          </tr>
                          <?php

    /*$sql=mysql_query("SELECT * FROM lgt.cart WHERE Username='$usr'");
  $old_cart=mysql_fetch_object($sql);
  if(!empty($old_cart)){
    while($old_cart){?>
  <tr>
    <td><?php echo $old_cart->id;?></td>
    <td><?php echo $old_cart->Product_Id;?></td>
    <td><?php echo $old_cart->Product_Name;?></td>
    <td><?php echo $old_cart->Amount;?></td>
    <td><?php echo $old_cart->Product_Model;?></td>
    <td><?php echo $old_cart->Price;?></td>
    <td><?php echo $old_cart->Availability;?></td>
    <td>
<button type="submit" name="update" value="update" class="btn btn-success">Update</button>

  </td><?php
  }
}?>*/?>
  <?php
if(empty($_SESSION["shopping_cart"])){
    echo  '<h3 id="services" class"btn-warning"  class="text-center title"><p style="background-color:lightblue">You Have Empty Cart</p></h3>';
                              }
  else if (!empty($_SESSION["shopping_cart"]))
                {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
              {?>
      <td><?php echo $values["item_id"];?></td>
      <td><?php echo $values["item_name"];?><input type="hidden" name="hidden_name" value="<?php echo $values["item_name"]; ?>"/></td>
      <td><?php echo $values["item_model"];?></td>
<?php echo '<td><input type="text" size="2" maxlength="2"
name="'.$values["item_id"].'" value="'.$values["item_quantity"].'" /></td>';?>       <td><?php echo $values["item_price"];?></td>
       <td><?php echo $values["item_availability"];?></td>
       <td><?php echo $values["discription"];?></td>
<td><a href="cart.php?action=update&id=<?php echo $values["item_id"]; ?>">
  <!--input id="product_qty" name="product_qty" type="submit" value="Update" class="qntbtn"/--><button class="btn btn-success">Update</button></a>
      <!--input name="item_to_adjust" type="hidden" value="'<?php $item_id; ?>'" /-->
<!--button type="submit" name="update" value="update" class="btn btn-success">Update</button-->

    <a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>">
    <span class="text-danger"><button class="btn btn-danger">Remove</button></span></a></td></tr>
                               <?php
                                }?>
                          <?php
                          }
                          ?>
                     </table>
    <!--form action="cart.php" id="cart-form" method="post" style="display: block;"-->
  <form action="cart.php" method="post">
<div style="font-family:Times New Roman,Times,serif;padding-left: 300px">
<button name="ordr_later" id="ordr_later" style="font-size:17px;padding-left:20px" type="submit" class="btn-warning">Order Other Day</button>
<span style="font-size:17px;padding-left:20px">
<button name="ordr_now" id="ordr_now" type="submit" style="font-size:17px">Order Now
</button></span>
</div></form>
</div>
</div>
</div>
</div>
	<?php include 'footer.php'; ?>
	</body>
</html>
