<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class = "container">
        <div class = "box form-box">
            <?php 
                include("php/config.php");
                if(isset($_POST['submit'])){
                $useremail = mysqli_real_escape_string($con,$_POST['useremail']);

                $password = mysqli_real_escape_string($con,$_POST['password']);

                $result = mysqli_query($con,"SELECT * FROM users WHERE (email='$useremail' OR username='$useremail') AND password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['userid'] = $row['userid'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    
                }else{
                    echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                        </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Go Back</button>";
            
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
                }else{
            
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="useremail">Email or Username</label>
                    <input type="text" name="useremail" id="useremail" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="signup.php">Sign up Now</a>
                    </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>