
<HTML>
  <head> 
  
	<style> 
input[type=button], input[type=submit], input[type=reset] {
    background-color: #3CBC8D;
    border: none;
    color: white;
    padding: 13px 28px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
	font-size: 15;
}

input[type=text] , input[type=date], input[type=password]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white;
}

</style>

    <title>Register Page</title> 
		<link rel="stylesheet" type="text/css" href="Cabsonline_Style.css">
  </head> 
  <body>
  <center>
  <br><br><br><br>
  <H1>Lets travel</H1>
	<H2>Register to Lets travel</H2>

  <form>
		<table> <tr> <td>
        <font size="5">Customer_id:&nbsp</font></td><td><input type="text" name="idfield"> </label></td></tr>
		<tr><td>
		<font size="5">Name:&nbsp</font></td><td><input type="text" name="namefield"> </label></td></tr>
		<tr><td>
		<font size="5">Address:&nbsp</font></td><td><input type="text" name="addressfield"> </label></td></tr>
		<tr><td>
		<font size="5">Date of birth:&nbsp</font></td><td><input type="date" name="mydate"> </label></td></tr>
		<tr><td>
		<font size="5">Age:&nbsp</font></td><td><input type="text" name="agefield"> </label></td></tr>
		<tr><td>
		<font size="5">Password:&nbsp</font></td><td><input type="password" name="passwordfield"> </label></td></tr>
		<tr><td>
		<font size="5">Confirm Password:&nbsp</font></td><td><input type="password" name="confirmpasswordfield"> </label></td></tr>
		<tr><td>
		<font size="5">Email:&nbsp</font></td><td><input type="text" name="emailfield"> </label></td></tr>
		<tr><td>
		<font size="5">Phone:&nbsp</font></td><td><input type="text" name="phonefield"> </label></td></tr>
		<tr><td>
		<input type="submit" value="Register" /></br></td><td></td></tr></table>
		<H2>Already registered? <a href="gitlogin.php">Login here</a></H2>
  </form>
   
  </center>

<?php 
	
	if(isset($_GET['idfield']) && isset ($_GET['namefield']) && isset ($_GET['addressfield'])  && isset ($_GET['agefield'])&& isset ($_GET['mydate']) && isset($_GET['passwordfield']) && isset($_GET['confirmpasswordfield']) && isset($_GET['emailfield']) && isset($_GET['phonefield']))
	{
		
		
		$customer_id=trim($_GET['idfield']);
		$name = trim($_GET['namefield']);
		$address=trim($_GET['addressfield']);
		$age=trim($_GET['agefield']);
		$dob=trim($_GET['mydate']);
		$password = trim($_GET['passwordfield']);
		$confirm_password = trim($_GET['confirmpasswordfield']);
		$email = trim($_GET['emailfield']);
		$phone = trim($_GET['phonefield']);
		
		if(empty($name) || empty($password) || empty($confirm_password) || empty($email) || empty($phone) || empty($customer_id)||empty($age))
		{
			echo "Please provide inputs to all the fields";
			exit();
		}
		else
		{
			if($age<15)
			{
				echo "U are too young to register";
				exit();
			}
			
			if($password === $confirm_password)
			{
				
				if(ValidateEmail($email,$name))
				{
					
					RegisterUser($customer_id,$name,$address,$dob,$password,$email,$phone);
				}
				else
				{
					echo "Please enter valid email address";
					exit();
				}
			}
			else
			{
				echo "Password and Confirm password should be same";
					exit();
			}
		}
	}
	function ValidateEmail($emailid,$name)
	{
		if(strpos($emailid, '@') > 0 && strpos($emailid, '.') > strpos($emailid, '@')+1 && strpos(strrev($emailid), '.') > 0)
		{
			return true;
		}
		else
			{
				return false;
				
			}
		
	}
	
	function RegisterUser($customer_id,$name,$address,$dob,$password,$email,$phone)
	{
		$DBConnect = @mysqli_connect("localhost", "root","", "Cab_management")
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ".
		mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
		$SQLstring = "select count(*) from customer where C_email = '".$email."'";
		$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the table.</p>"."<p>Error code ".
		mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
		$row = mysqli_fetch_row($queryResult);
		if($row[0] == 1)
		{
			echo "This email is already registered!";
			exit();
		}
		else
		{
			$SQLstring = "Insert into customer (c_id,c_name,c_address,c_dob,c_pwd,c_email,c_Mobileno) values('".$customer_id."','".$name."','".$address."','".$dob."','".$password."','".$email."','".$phone."')";	
			$queryResult = @mysqli_query($DBConnect, $SQLstring)
			Or die ("<p>Unable to insert into the table.</p>"."<p>Error code ".
			mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
		    echo "<center>Thank you for registration, Please check your email addess for a new mail.Please click login</center>";
             
		}
	}
	
?>
</body>
</HTML>
