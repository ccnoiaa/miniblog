<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
        
            <?php     
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $confirmpassword = $_POST['confirmpassword'];

                //verifying the unique email

                $verify_query = mysqli_query($con,"SELECT email FROM users WHERE email='$email'");

                if(mysqli_num_rows($verify_query) !=0 ){
                    echo "<div class='message'>
                            <p>This email has already been used, Please Try Again!</p>
                        </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                }
                else{

                    mysqli_query($con,"INSERT INTO users(username,email,password,confirmpassword) VALUES('$username','$email','$password','$confirmpassword')") or die("Error Occured");

                    echo "<div class='message'>
                            <p>Sign up successfully!</p>
                        </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Login Now</button>";
                }
            
            }else{
            ?>

            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpassword" autocomplete="off" required>
                </div>
                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Sign Up" required>
                </div>
                <div class="links">
                    Already have an account? <a href="login.php">Login</a>
                    </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>