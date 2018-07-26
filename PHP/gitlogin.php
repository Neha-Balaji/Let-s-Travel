
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
	font-size: 10;
}

input[type=text] ,input[type=password]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white;
}

</style>
 
    <title>Login Page</title> 
	<link rel="stylesheet" type="text/css" href="Cabsonline_Style.css">
  </head>
<center>  
  <body><br><br><br><br>
  <H1>"Lets Travel"</H1>
	
	<H1>Login to Lets travel</H1>
  <form>
		<table> <tr> <td>		
		<font size="5">Email:&nbsp</font></td><td><input type="text" name="emailfield"></td></tr>
		<tr><td>
		<font size="5">Password:&nbsp</font></td><td><input type="password" name="passwordfield"> </label></td></tr>
		<tr><td>
		<input type="submit" value="Login" /></br></td><td></td></tr></table>
		<H2>New member? <a href="gitregister.php">Register now</a></H2>
  </form>
  </body>
</center>  

<?php 
	
	if(isset($_GET['emailfield']) && isset($_GET['passwordfield']))
	{
		$email = trim($_GET['emailfield']);
		$password = trim($_GET['passwordfield']);
		
		if(empty($email) || empty($password))
		{
			echo "Please enter email address and password";
			exit();
		}
		else
		{
			
			$Customer_No = ValidateUser($email,$password);
			
			if(!(empty($Customer_No)))
			{
				
				if($Customer_No == 1)
				{
					
					
					$host  = $_SERVER['HTTP_HOST'];
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$query_string = "gitadmin.php";
					header("Location: http://$host$uri/$query_string");
				}
				else
				{
					
					$host  = $_SERVER['HTTP_HOST'];
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					$query_string = 'taxitable1.php?Customer_Id=' . $Customer_No;
					header("Location: http://$host$uri/$query_string");
				}
				echo "Logged in succesfully";
			}
		}
	}

	
	function ValidateUser($email,$password)
	{
		$DBConnect = @mysqli_connect("localhost", "root","", "Cab_management")
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ".
		mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
		
		$SQLstring = "select C_id from customer where C_Email = '".$email."' and C_Pwd = '".$password."'";
		
		$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the customer table.</p>"."<p>Error code ".
		mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
		
		$row = mysqli_fetch_row($queryResult);
		
		if(count($row) > 0)
		{
			return $row[0];
		}
		else
		{
			echo "<br>Please provide registered email address and password";
			exit();
		}
	}
?>
</HTML>

