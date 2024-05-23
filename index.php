<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#4285f4" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css">
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <title>Toodify</title>
</head>

<body>
    <?php
    include("header.php");
    ?>

    <center>
        <h1>Welcome to Toodify</h1>
        <p>
            Create something unique by using Toodify!!!!!!!!!!!!!!!!!!!
        </p>
    </center>
</body>

</html>

<?php
    if (!empty($_SESSION["username"]) && !empty($_SESSION["username"])) {
        header("Location: dashboard.php");
    }
?>