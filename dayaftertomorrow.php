<?php
    $con = mysqli_connect('localhost','root','','birthdaydb');
    if(!$con){
        echo "Error : Cannot connect with database rigt now.." . PHP_EOL;
        exit;
    }

    //***************Change this things (get username and it to the sql query)********************************

    // /////////////Use something called as sessions//////////////////////////////


    $query="SELECT firstname,lastname,prefferedname,category,dateOfBirth FROM user where  MONTH(dateOfBirth)=MONTH(CURRENT_DATE) AND  DAY(dateOfBirth)=DAY(CURRENT_DATE+ INTERVAL 2 day) AND personalemail!='xx'";
    $result = mysqli_query($con,$query);

			if($result){
				$rows =  mysqli_num_rows($result);
				if($rows>0)
				{	
					echo "<table id='tblTomorrowUsers' border=1 width=100%>
						<tr>
                            <th>First Name</th>
                            <th>Last Name</th>                    
                            <th>Preffered name</th>  
                            <th>Category</th>
                            <th>Date of Birth</th>
							
							
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
					echo "No Birthdays Day After Tommorow! ".mysqli_error($con);
				}
			}
?>
