<?php
    session_start();
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#4285f4">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" class="login-form">
        <div class="input">
            <label for="username">Enter Your User Name</label>
            <input 
                type="text" 
                maxlength="25" 
                minlength="3" 
                name="username" 
                placeholder="username" 
                id="username" 
                aria-label="Username"
                required
            />
        </div>
        <div class="input">
            <label for="password">Enter Your Password</label>
            <input 
                type="password" 
                maxlength="25" 
                minlength="3" 
                name="password" 
                placeholder="password" 
                id="password" 
                aria-label="password"
                required
            />
        </div>
        <button type="submit">Login</button>
    </form>

</body>

</html>

<?php
    $name = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($name)) {
            echo "Username is empty!!";
        } elseif(empty($password)) {
            echo "Password is empty!!";
        }else {
            $sql = "
                SELECT * FROM users
            ";
            $data = mysqli_query($conn, $sql);
            if (mysqli_num_rows($data) > 0) {
                while ($rows = mysqli_fetch_assoc($data)){
                    if ($name == $rows["user"] && $password == $rows["password"]) {
                        $_SESSION["username"] = $name;
                        $_SESSION["password"] = $password;
                        header("Location: dashboard.php");
                    } else {
                        echo "User does not exist";
                    }
                }
            }
            mysqli_close($conn);
        }
    }
    if (!empty($_SESSION["username"]) && !empty($_SESSION["username"])) {
        header("Location: dashboard.php");
    }
?>