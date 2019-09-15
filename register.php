
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
</head>
<body>
    <form method="post" action="register_action.php">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <label for="firstname"><b>Firstname</b></label>
            <input type="text" placeholder="Enter Firstname" name="firstname" required>
            <br>
            <label for="surename"><b>Surename</b></label>
            <input type="text" placeholder="Enter Surename" name="surename" required>
            <br>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <br>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <br>

            <label for="psw-repeat"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
            <hr><br>
            <button type="submit" class="registerbtn">Register</button>
        

        
    </form>
</body>
</html>