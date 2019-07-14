<?php
    session_start();
    
    isset($_POST['btnLogin']);
    $con = mysqli_connect('localhost','root','','birthdaydb');
    if(!$con){
        echo "Error : Cannot connect with database rigt now.." . PHP_EOL;
        exit;
    }

    $postedValues =array('txtUserName','txtPassword');
    foreach($postedValues as $value)
        if(empty($_POST[$value])){
            exit("Incorrect Username or Password");
        }
        $userName=$_POST['txtUserName'];
        $password=$_POST['txtPassword'];

        

        $query="select * from user where personalemail='$userName' AND password='$password'";
        
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result);
        $count= mysqli_num_rows($result);

        $varname=$row['firstname'];
        $role=$row['UserRole'];
        $firstname=$row['firstname'];
        $lastname=$row['lastname'];

        $_SESSION["username"] = $userName;
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;


        $check=($count==1 ? TRUE:FALSE);
        
        if($check){
            if($role=='USER')
                header('refresh:1; URL = dashboardUser.php');
            if($role=='ORGANIZER')
                header('refresh:1; URL = dashboardOrganizer.php');
            if($role=='ADMINISTRATION')
                header('refresh:1; URL = DashboardAdministrator.php');
        }
            
        else{
            echo "<script type='text/javascript'>alert('Incorrect username or password..');</script>";
            header('refresh:1; URL = index.html');
        }
?>