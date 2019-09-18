<html>
<head>
<font color="red">
<center>
 <style> body { background-image: url("h3.jpg"); background-repeat: no-repeat; } </style> 
</head>
<center><h1> VIEW DATA OF PATIENTS</H1></center>
</font>
<font align="right">
<a href="main_page.html"> <h2><font color="black">Go BACK</font></h2> </a>
<br>
<a href="contact.php"> <h2><font color="black">REGISTER</font></h2> </a>
</font>
<?php
	    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = 'user';
	    $dbname=  'list';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
             
            if(!$conn) 
	{
               die('Could not connect: ' . mysqli_error());
            }	
$sql= "SELECT ID,name,email,dept from patient where DATE(adate)=CURDATE()";
echo "<b>";
echo "Following are the registrations made today"." ".date("Y/m/d");
echo "</b>";
echo "<br>";
echo "<br>";
echo "<br>";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0)
{
	while($row=mysqli_fetch_assoc($result))
	{	
	echo"ID        :".$row["ID"]."<br>"."<br>";
	echo"NAME      :".$row["name"]."<br>"."<br>";
	echo"EMAIL     :".$row["email"]."<br>"."<br>";
	echo"DEPT      :".$row["dept"]."<br>"."<br>";
        echo "<br>";
        echo "<br>";
	
	}
}
	else
	{
	echo"NO RECORD FOUND";
	}	
mysqli_close($conn);


?>
</body>
</HTML>

