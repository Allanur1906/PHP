

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <form action="login_post" method="post" >
    <h2>LOGIN</h2>
    <?php if(isset($_SESSION['error'])){ ?>
        <p class="error"> <?php echo $_SESSION['error']; ?></p>
    <?php }?>
    
    <label>Username</label>
    <input type="text" name="email" placeholder="email" value="admin@admin.com"><br>
    <label>Password</label>
    <input type="password" value="admin" name="Password" placeholder="Password"><br>
    <button type="submit"> Login</button>


    </form>   
</body>
</html>