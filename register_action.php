<?php
require_once "Connection.php";
global $connection;
if(!$connection){
    echo "CONNECTION FAILED";
}
//Getting all values from inputs from register.php
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$surename = filter_input(INPUT_POST, 'surename', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password_rpt = filter_input(INPUT_POST, 'psw-repeat', FILTER_SANITIZE_STRING);
//SQL query whick checking does any of users have email which is putted in email place
//if allready exists user cant be inserted
$sql_checking = mysqli_query($connection,"SELECT * FROM users_of_app WHERE email = '".$email."'");
$check_num_rows = mysqli_num_rows($sql_checking);
if($check_num_rows==1){
    echo "<div class='form'>
    <h3>User with this email already exists please try with another one</h3>
    <br/>Click here to <a href='register.php'>Register</a></div>";
}else{
    //Checking password and repeated password are they the same if not user cant be inserted
    if($password !== $password_rpt){
        echo "<div class='form'>
        <h3>Repeated password is different</h3>
        <br/>Click here to <a href='register.php'>Register</a></div>";
    }else{
        //inserting user 
        $sql = "INSERT INTO users_of_app (firstname,surename,email,password) VALUES('".$firstname."','".$surename."','".$email."','".$password."')";
        $result = mysqli_query($connection,$sql);
        if(!$result){
            die("QUERY FAILED");
        }
        //redirecting to home.php
        header("Location: home.php");
    }
}
?>