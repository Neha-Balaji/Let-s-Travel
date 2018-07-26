<!doctype html>
    <html lang="en">
	<body>
	<center>
	<H3>cab Selection</H3>

<?php

		$mysqli = new mysqli("localhost", "root", "", "Cab_management");
$result2 = $mysqli->query("SELECT T_id,D_id,reg_no,Vehicle_name,seating_capacity,color,tmode,type from cab where T_id='".$taxiid[0]."'");
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
      <tbody><br><br>	  
<?php	  
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
    </table>
	<head> 
    <title>cab details page</title> 
		<link rel="stylesheet" type="text/css" href="Cabsonline_Style.css">
  </head> 
  

  <form>
		<table> <tr> <td><br>
        cab name:</td><td><input type="text" name="namefield"> </label></td></tr>
		<tr><td>
		<H2><a href="taxitable1.php">Back</a></H2>
		<H2><a href="gitbooking.php">Book now</a></H2>
  </form>
  </center>
	</body>
	</html>