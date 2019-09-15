<?php
require_once "Connection.php";
//Function for selecting all users from table users_of_app
function selectAll(){
    //calling global variable for connection
    global $connection; 
    //checking does exist connection
    if(!$connection){
        die ("FAILED TO CONNECT");
    }
    //writing sql for selecting all
    $sql=mysqli_query($connection,"SELECT * FROM users_of_app ");
    //Using while loop to catch all values from table
    while($row = mysqli_fetch_array($sql)){
        if(!$row){
            die("QUERY FAILED");
        }
        //Pringting all values
        echo "<tr>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['surename']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['password']}</td>";
        echo "</tr>";
    }
}
?>
<!DOCTYPE html>
<html>
    <header>
        <title>
            PHP Application - Home Page
        </title>
    </header>
    <body>
        <h1>PHP Application - Home Page</h1>
        <hr>
        <form name="searchForm" action="home_search.php"  method="POST">
            <input type="text" name="searchLabel"/>
            <input type="submit" value="Submit"> 
        </form>
        <hr>
        <table border="1">
            <tr>
                <th>Firstname</th>
                <th>Surename</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
                <?php selectAll() ?>
        </table>
        <button type="submit"><a href="login.php">Login: </a></button>
        <button type="submit"><a href="register.php">Register: </a></button>
    </body>
</html>