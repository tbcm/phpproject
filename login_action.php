<?php require_once "Connection.php";
global $connection;
//Getting values from inputs 
$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
//SQL query for selecting where email and password need to be same like in iput 
$sql = mysqli_query($connection,"SELECT * FROM `users_of_app` WHERE email = '".$email."' AND password = '".$password."'");
$rows = mysqli_num_rows($sql);
//Checking if user exists if exists redirect to home.php
if($rows == 1){
    header("Location: home.php");
}else{
    //Showing message because user didnt type correct email or password
	echo "<div class='form'>
    <h3>Email/password is incorrect.</h3>
    <br/>Click here to <a href='login.php'>Login</a></div>";
	}

?>