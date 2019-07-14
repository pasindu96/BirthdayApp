<?php
    isset($_POST['btnSubmit']);
    
    $con = mysqli_connect('localhost', 'root', '', 'birthdaydb');
    if(!$con){
        echo "Error : Cannot connect to MySQL.. " . PHP_EOL;
        exit;
    }

    $postedValues= array('txtFirstName','txtLastName','txtPrefferedName','txtPersonalEmail','txtPassword',
                         'txtOfficialEmail','txtMobile','txtFBURL','txtDesignation','txtNIC','txtIndexNumber',
                         'dropdownFood','txtDate','dropdownCategory','dropdownRole','txtNotes'
                        );

    foreach($postedValues as $value){
        /*if(empty($_POST[$value])){
            exit("Error : Incomplete form of data ");
        }*/
    }
    

    $fname=$_POST['txtFirstName'];
    $lname=$_POST['txtLastName'];
    $prefferedName=$_POST['txtPrefferedName'];
    $personalEmail=$_POST['txtPersonalEmail'];
    $password=$_POST['txtPassword'];
    $officalEmail=$_POST['txtOfficialEmail'];
    $mobile=$_POST['txtMobile'];
    $fbURL=$_POST['txtFBURL'];
    $designation=$_POST['txtDesignation'];
    $NIC=$_POST['txtNIC'];
    $indexNumber=$_POST['txtIndexNumber'];
    $dropdownFood=$_POST['dropdownFood'];
    $daydob=$_POST['txtDate'];
    $dropdownCategory=$_POST['dropdownCategory'];
    $dropdownRole=$_POST['dropdownRole'];
    $txtNotes=$_POST['txtNotes'];

    $query="insert into user values ('$fname','$lname','$prefferedName','$personalEmail','$password','$officalEmail','$mobile',
    '$fbURL','$designation','$NIC','$indexNumber','$dropdownFood','$daydob','$dropdownCategory','$dropdownRole','$txtNotes')";
    
    $result=mysqli_query($con,$query);
    if(!$result){
        exit("Error : User registration failed .. " . mysqli_error($con));
    }
    mysqli_close($con);
    echo "User added succesfully.. Redirecting .." . PHP_EOL;
    header('refresh:1; URL = addUser.html');
?>