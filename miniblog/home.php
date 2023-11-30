
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Mini Blog</a> </p>
        </div>
        <div class="right-links">
            <a href="php/logout.php"> <button class="btnright">Log Out</button> </a>
            <a href="createpost.php"> <button class="btnright">Create a post</button></a> 
        </div>
    </div>
    <main>

        <div class = "box form-box">
          <div class="top">
            <div class = "box post-box">       
            <?php 
                include("php/config.php");

                $query = mysqli_query($con,"SELECT*FROM dashboard");
                while($result = mysqli_fetch_assoc($query)){
                    $res_post_title = $result['post_title'];
                    $res_content = $result['content'];
                    $res_timestamp = $result['timestamp'];
                }
            ?>          
            <div class="box">
                <p><b><?php echo $res_post_title ?></b></p>
                <p><?php echo $res_content ?></p>
                <p id=ts><?php echo $res_timestamp ?></p>
            </div>  
                <div class="right-links"> 
                    <a href="editpost.php" class="rlinks">Edit</a>
                    <input type="submit" class="btn" name="submit" value="Delete" required>
                </div>
            </div>
          </div>
       </div>

    </main>
</body>
</html>