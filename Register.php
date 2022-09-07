<?php
include ('connect.php');
$success=" ";$nameError=" ";$CnameError=" ";$phoneError=" ";
$emailError=" ";$usernameError=" ";$passError=" ";$confpassError=" ";
if(!$link){
    die ('Could not connected'.mysql_error());
}
  /*  mysql_select_db('lgt');
if(isset($_POST['register_btn'])){
$Fname=$_POST['Fname'];
$Cname=$_POST['Cname'];
$phone=$_POST['phone'];
$Email=$_POST['Email'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$custoner_id='lgtc'.rand(1,1000);
$sql="INSERT into customer(Customer_ID,FullName,CompanyName,Phone,Email,UserName,Password) VALUES
   ('$custoner_id','$Fname','$Cname','$phone','$Email','$username','$pass');";
$insert=mysql_query($sql);
if($insert){
    $success='<div style="color:green;font-weight:bolder;background-color:lightblue;font-size:18px" >You Are Registered Successfully</div>';
      header("register.php");
    }else{
         $success='<div style="color:red;font-weight:bolder;background-color:lightblue" >Could Not Register Customer</div>'.mysql_error();
        header("Register.php");
    }
mysql_close();
}*/
	if( isset($_SESSION['customer'])!="" ){
		header("Location: index.php");
	}
	$error = false;
	if ( isset($_POST['register_btn']) ) {
		$name = trim($_POST['Fname']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);

		$email = trim($_POST['Email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);

		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

    $Cname=trim($_POST['Cname']);
    $Cname=htmlspecialchars($Cname);
    $Cname=strip_tags($Cname);

    $phone=trim($_POST['phone']);
    $phone=htmlspecialchars($phone);
    $phone=strip_tags($phone);

    $username=trim($_POST['username']);
    $username=htmlspecialchars($username);
    $username=strip_tags($username);

    $passagain=trim($_POST['passagain']);
    $passagain=htmlspecialchars($passagain);
    $passagain=strip_tags($passagain);

    $customer_id='lgtc'.rand(1,1000);

    		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT Email FROM customer WHERE Email='$email'";
			$result = mysql_query($query);
			$count = mysql_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided email is already in use.";
			}
		}
     if (!preg_match("/^[a-zA-Z ]+$/",$Cname)) {
      $error = true;
      $CnameError = "Company name must be alphabets and space.";
    }
    if (empty($phone)) {
      $error = true;
      $phoneError = "Please enter your phone number.";
    } else if (strlen($phone) < 10) {
      $error = true;
      $phoneError = "Please enter correct phone number.";
    } else if (preg_match("/^[a-zA-Z ]+$/",$phone)) {
      $error = true;
      $phoneError = "Phone must be numbers only.";
    }
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "Password must have atleast 6 characters.";
		}
    if (empty($username)) {
      $error = true;
      $usernameError = "Please enter your user name.";
    }
    if($pass!==$passagain){
      $confpassError = "Password Do Not Match.";
    }
		// password encrypt using SHA256();
		$password = hash('sha256', $pass);
		// if there's no error, continue to signup
		if( !$error ) {
			$query = "INSERT into customer(Customer_ID,FullName,CompanyName,Phone,Email,UserName,Password) VALUES
         ('$customer_id','$name','$Cname','$phone','$email','$username','$password');";
			$res = mysql_query($query);
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you can login now";
				unset($name);
				unset($email);
				unset($pass);
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";
			}
		}
	}
?>
<html>
<link rel="stylesheet" href="style.css" type="text/css">
<!--link rel="javascript" href="javascript.js" type="text/javascript"-->
<script src="javascript.js"></script>
<?php include 'header.php';?>
<?php include 'nav.php';?>

<div class="Register_body" style="margin-top:1px">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
<fieldset>
<h5 style="color:blue;margin-left:200px">Customer Registration</h5>
<p style="color:red;margin-left:200px">* Required Fields</p>
<div style="margin-left: 150px">
  <?php
     if ( isset($errMSG) ) {

       ?>
       <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
       <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
               </div>
             </div>
               <?php
     }?>
<table>
<div style="margin-right:100px;text-align: center;margin-bottom:20px;">
<?php echo $success; ?>
</div>
<tr><td style="padding-top:20px;font-weight: bold;">Full name:<span style="color:red">*</span></td>
<td><span style="padding-left: 46px"><input class="form-control" placeholder="Full Name" style="font-weight: bold;font-size: 16px margin-top:20px" type="text" name="Fname" /> </span>
 <span class="text-danger"><?php echo $nameError; ?></span></td></tr>
<tr><td style="padding-top:20px;font-weight: bold;">Company Name:</td>
<td><span style="padding-left: 46px"><input class="form-control" placeholder="Company Name" style="font-weight: bold;font-size: 16px margin-top:20px" type="text" name="Cname" /></span>
<span class="text-danger"><?php echo $CnameError; ?></span></td></tr>
<tr><td style="padding-top:20px;font-weight: bold;">Phone:<span style="color:red">*</span></td>
<td><span style="padding-left: 46px"><input class="form-control" placeholder="Phone" style="font-weight: bold;font-size: 16px margin-top:20px" type="text" name="phone" /></span>
<span class="text-danger"><?php echo $phoneError; ?></span></td></tr>
<tr><td style="padding-top:20px;font-weight: bold;">Email:<span style="color:red">*</span></td>
<td><span style="padding-left: 260px"><input class="form-control" placeholder="Email" style="font-weight: bold;font-size: 16px margin-top:20px" type="text" name="Email" /></span>
<span class="text-danger"><?php echo $emailError; ?></span></td></tr>
</table>
<table>
<tr><td style="padding-top:20px;font-weight: bold;">User Name:<span style="color:red">*</span></td><td>
<span style="padding-left: 260px"><input class="form-control" placeholder="User Name"style="font-weight: bold;font-size: 16px;margin-left:27px" type="text" name="username"/></span>
<span class="text-danger"><?php echo $usernameError  ; ?></span></td></tr>
<tr><td style="padding-top:20px;font-weight: bold">Password:<span style="color:red">*</span></td><td>
<input class="form-control" placeholder="Password" style="font-weight: bold;font-size: 16px;margin-left:27px" type="password" name="pass"/>
<span class="text-danger"><?php echo $passError; ?></span></td></tr>
<tr><td style="padding-top:20px;font-weight: bold">Password:<span style="color:red">*</span></td><td>
<input class="form-control" placeholder="Confirm Password" style="font-weight: bold;font-size: 16px;margin-left:27px" type="password" name="passagain"/>
<span class="text-danger"><?php echo $confpassError; ?></span></td></tr>
</table>
</p>
<div style="padding-left:110px;padding-top: 10px;padding-bottom: 10px">
<button  class="btn"  type="submit" value="Register" name="register_btn" style="font-family:cursive;" ><i>Register</i></button>
<button  class="btn btn-warning"   type="reset" value="Register" style="font-family:cursive;" ><i>Cancel</i></button>
</div>
</table>
</fieldset>
</div>
</form>
</div>
</body>
<?php include 'footer.php';?>
</html>
