<?php
    session_start();
    include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="theme-color" content="#4285f4" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="index.css"> -->
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <title>Toodify</title>
</head>

<body>
    <!-- <?php
    // include("header2.php");
    ?>

    <center>
        <h1>Welcome back</h1>
    </center> -->
    
</body>

</html>

<?php
    $sql = "
        SELECT * FROM users
    ";
    $result = mysqli_query($conn, $sql);
    $response = array();
    $x = 0;

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='box-container'>";
        while ($rows = mysqli_fetch_assoc($result)){
            foreach ($rows as $key => $value) {
                echo "
                    <div class='box'>
                        <h2>$key</h2>
                        <p>
                            $value
                        </p>
                    </div>
                ";
            }
            $x++;
        }
        echo "</div>";
    }

    $s = json_encode($response, JSON_PRETTY_PRINT);

    if (empty($_SESSION["username"]) && empty($_SESSION["password"])) {
        header("Location: login.php");
    }
?>