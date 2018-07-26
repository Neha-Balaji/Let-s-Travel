<!doctype html>
    <html lang="en">
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
	font-size: 100;
}

input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color: #3CBC8D;
    color: white;
}

</style>
</head>
	<body>
	
  <center>
  
  <br><br><br><br>
  <H1>Taxi company Selection</H1>
	<H2>Select your comfortable cab</H2>
      <?php
      
$mysqli = new mysqli("localhost", "root", "", "Cab_management");
$result = $mysqli->query("select * from taxi_company");

      ?>
      <table border="2" style= "background-color: #3CBC8D; color: #761a9b; margin: 0 auto;" >
      <thead>
        <tr>
          <th>Taxi_id</th>
          <th>Taxi_Name</th>
          <th>Average rating</th>
          <th>Cost per km</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
		
          while(  $row = $result->fetch_assoc() ){
            echo
            "<tr>
              <td>{$row['T_id']}</td>
              <td>{$row['Tname']}</td>
              <td>{$row['Avg_rating']}</td>
              <td>{$row['cost_per_km']}</td>
              
            </tr>\n";
          }
        ?>
      </tbody>
    </table>
  <head> 
    <title>taxi company page</title> 
		<link rel="stylesheet" type="text/css" href="Cabsonline_Style.css">
  </head> 
  

  <form>
		<table> <tr> <td><br><br>
        <font size="5">Taxi name:&nbsp</font></td><td><br><br><input type="text" name="namefield"> </label></td></tr>
		<tr><td><br>
		<input type="submit" value="I prefer" /></br></td><td></td></tr></table>
		
  </form>
  </center>
  
<?php

	if(isset($_GET['namefield']))
	{
		$taxi_name=trim($_GET['namefield']);
		if(empty($taxi_name))
		{
			echo "Please provide inputs to all the fields";
				exit();
		}
		else
		{
		$mysqli = new mysqli("localhost", "root", "", "Cab_management");
		$result1 = $mysqli->query("SELECT T_id,Tname,Avg_rating,cost_per_km from taxi_company where Tname='".$taxi_name."'");
	    $row1 = $result1->fetch_assoc();
		$res = $mysqli->query("select T_id from taxi_company where Tname='".$taxi_name."'");
		$taxiid = $res->fetch_array();
		include "cabdetails1.php";
	
	    /*$result2 = $mysqli->query("SELECT T_id,D_id,reg_no,Vehicle_name,seating_capacity,color,tmode,type from cab where T_id='".$taxiid[0]."'");
		?>
	    
	  
	while($row2 = $result2->fetch_assoc())
		{
		
         echo  "<tr>
              <td>{$row2['T_id']}</td>
			  <td>{$row2['D_id']}</td>
              <td>{$row2['reg_no']}</td>
              <td>{$row2['Vehicle_name']}</td>
			  <td>{$row2['seating_capacity']}</td>
			  <td>{$row2['color']}</td>
              <td>{$row2['tmode']}</td>
              <td>{$row2['type']}</td>
			  
			  </tr>\n";
		}
		?>
	
	
	
	</tbody>
    </table>*/

		}
	}
		?>

</body>
 </html>