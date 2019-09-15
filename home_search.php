<?php
require_once "Connection.php";
//function for searching by email,firstname,surename
function select(){
    global $connection;
    if(!$connection){
        die ("FAILED TO CONNECT");
    }
    //getting value from search bar 
    $search_bar = filter_input(INPUT_POST, 'searchLaber', FILTER_SANITIZE_SPECIAL_CHARS);
    //checking is search bar empty if is empty showing all from table if not showing only selected by firstname or surename or email
    if($search_bar == null){
        $sql=mysqli_query($connection,"SELECT * FROM users_of_app ");
    }else{
        $sql=mysqli_query($connection,"SELECT * FROM users_of_app WHERE (firstname = '".$search_bar."') OR (surename = '".$search_bar."') OR (email = '".$search_bar."')");
    }
    //using while loop to chatch all values and print them
    while($row = mysqli_fetch_array($sql)){
        if(!$row){
            die("QUERY FAILED");
        }
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
            <input type="text" name="searchLaber"/>
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
                <?php select() ?>
        </table>
        <button type="submit"><a href="login.php">Login: </a></button>
        <button type="submit"><a href="register.php">Register: </a></button>
    </body>
</html>