<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<?php
$error=0;
$patErr = $nameErr = $emailErr = $deptErr = $adateErr = "" ;
$pat = $name = $email = $dept = $adate = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["pat"])) {
    $patErr = "Patient ID is required";
$error=1;
  } else {
    $pat = test_input($_POST["pat"]);
}


  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
$error=1;
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
$error=1;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
$error=1;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
$error=1;
    }
  }
    
  if (empty($_POST["dept"])) {
    $deptErr = "Department is required";
$error=1;
  } else {
    $dept = test_input($_POST["dept"]);
    }

  
  if (empty($_POST["adate"])) {
    $adateErr = "Date is Required";
$error=1;
  } else {
    $adate = test_input($_POST["adate"]);
    }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
</head>
<body>  
<style>
body { background-image: url("h2.jpg"); background-repeat: no-repeat; class:center; }
</style>
<table  cellspacing="5" rules="rows">
<tr>
<td><img src="h1.jpg" width="90%" height="70%"></td>
<td>
<i><h2 align="middle">REGISTER PATIENT</h2></i>
<p><span class="error">* required field.</span></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  Patient ID: <input type="text" name="pat" value="<?php echo $pat;?>">
  <span class="error">* <?php echo $patErr;?></span>
  <br><br> 
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Department: <input type="text" name="dept" value="<?php echo $dept;?>">
  <span class="error">*<?php echo $deptErr;?></span>
  <br><br>
  Date Of Registration(YYYY/MM/DD): <input type="text" size =10 name="adate" value="<?php echo $adate;?>">
  <span class="error">*<?php echo $adateErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  

</form>
<br>
<br>
<?php
if (isset($_POST["submit"]) && $error==0)
{ 
	if(isset($_POST['submit'])) 
	{
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'user';
	    $dbname= 'list';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
             
            if(!$conn) {
               die('Could not connect: ' . mysqli_error());
            }	
	else { echo "connected succcessfully"."<br>"; }

$sql = "INSERT INTO patient(ID, name, email, dept, adate) VALUES
($pat,'$name','$email','$dept','$adate')";
if(mysqli_query($conn,$sql))
{ 
echo "<b>"."Thanks for Registering Dear"."   ".$name."<br>"."Kindly go back and check whether your information in patient list is correct or register gain";
}

else{ echo "not entered (check the date format again)";}

}}

?>

</td>
</tr>
<tr>
<td><h4 align="middle">Contact Us</h4>
<p align="middle">ADITYA BIRLA HOSPITAL<br>
Office No~  V-3, WAKAD ,<br>
Near Zambad Estate, Shrey Nagar, Aurangabad <br>
Maharashtra Zip Code: 431005<br> 
Country: India <br>
Email: adityabirla@gmail.com
</td>
<td><br><img src="h4.jpg"  width="80%" height="90%"></td>
</tr>
</table>
<a href="main_page.html"> <h2><font color="black">BACK</font></h2> </a> </th>
</body>
</html>