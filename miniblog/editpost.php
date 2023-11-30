
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
            <a href="home.php"> <button class="btnright">Home</button> </a>
        </div>
    </div>

    <main>
            <div class = "box form-box">
            <?php     
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $post_title = $_POST['post_title'];
                    $content = $_POST['content'];

                    mysqli_query($con,"INSERT INTO dashboard(post_title,content,timestamp) VALUES('$post_title','$content',CURRENT_TIMESTAMP)") or die("Error Occured");

                    echo "<div class='message'>
                            <p>Successfully Updated!</p>
                        </div> <br>";
                    echo "<a href='home.php'><button class='btn'>Back to home</button>";
                }
            else{
            ?>
                <header>Edit Post</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="posttitle">Title</label>
                        <input type="text" name="post_title" id="post_title" autocomplete="off" required>
                    </div>                    
                    <div class="field input">
                        <label for="post">Content</label>
                        <textarea type="text" name="content" id="content"></textarea>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Post" required>
                    </div>
                </form> 
            <?php } ?>
        </div>
    </main>
</body>
</html>