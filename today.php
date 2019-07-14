<?php
	session_start();
?>
<?php
    $con = mysqli_connect('localhost','root','','birthdaydb');
    if(!$con){
        echo "Error : Cannot connect with database rigt now.." . PHP_EOL;
        exit;
    }

    //***************Change this things (get username and it to the sql query)********************************

    // /////////////Use something called as sessions//////////////////////////////

	$username=$_SESSION["username"];

    $query = "SELECT firstname,lastname,prefferedname,category,dateOfBirth FROM user where DAY(dateOfBirth)=DAY(CURRENT_DATE) AND MONTH(dateOfBirth)=MONTH(CURRENT_DATE) AND personalemail!='$username'";
    $result = mysqli_query($con,$query);

			if($result){
				$rows =  mysqli_num_rows($result);
				if($rows>0)
				{	
					echo "<table id='tableUsersToday' border=1 width=100%>
						<tr>
                            <th>First Name</th>
                            <th>Last Name</th>                    
                            <th>Preffered name</th>  
                            <th>Category</th>
                            <th>Date Of Birth</th>
							
							
						</tr>";
					while($record = mysqli_fetch_array($result))
					{

						echo "<tr>
							<td>".$record["firstname"]."</td>
							<td>".$record["lastname"]."</td>
                            <td>".$record["prefferedname"]."</td>
                            <td>".$record["category"]."</td>
                            <td>".$record["dateOfBirth"]."</td>                             							
							
						</tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "No Birthdays Today! ".mysqli_error($con);
				}
			}
?>