<?php
session_start();

$host = "localhost";
$db_user = "root";
$db_pass = "";
$dbname = "bankly_V2";

try {
    $connect_db = new PDO("mysql:host=$host;dbname=$dbname", $db_user, $db_pass);
    $connect_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "DB connected";
      
    if (isset($_POST['user'], $_POST['pass'])) {
        $form_user = $_POST['user'];
        $form_pass = $_POST['pass'];

        $stmt = $connect_db->prepare("SELECT * FROM user WHERE user_name = ?");
        $stmt->execute([$form_user]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);


       


        if ($data  && $form_pass == $data['password']) 
         {  
            sleep(5);
            header("Location: http://localhost/Bankly_V2/dashbord.php");
            // exit;

        } else {
            $error = "Username or password incorrect";
        }
    }

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BANKLY</title>
</head>
<body>
<div>
    <h2>Welcome to login Page</h2>
</div>
<div class="form">
    <div class="form-1">
        <div class="d1"></div>
        <marquee behavior="" direction="">0</marquee>
        <marquee behavior="" direction="right">1</marquee>
        <marquee behavior="" direction="">0</marquee>
        <marquee behavior="" direction="right">1</marquee>
        <marquee behavior="" direction="">1</marquee>
        <marquee behavior="" direction="right">0</marquee>
        <marquee behavior="" direction="">0</marquee>
        <marquee behavior="" direction="right">1</marquee>
        <marquee behavior="" direction="">0</marquee>
        <marquee behavior="" direction="right">1</marquee>
        <marquee behavior="" direction="">1</marquee>
        <marquee behavior="" direction="right">0</marquee>
        <div class="d2"></div>
    </div>

    <form class="form-2" method="POST">

        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <h3>login</h3>
        <div>
            <label for="username">username</label>
        </div>
        <div>
            <input name="user" type="text">
        </div>
        <div>
            <label for="password">password</label>
        </div>
        <div>
            <input type="password" name="pass">
        </div>
        <button type="submit">Login</button>
        <p>already register <a href="register.php">register</a></p>
    </form>
</div>

<footer class="footer">
    by Amine elarar devFL 2030
</footer>
</body>
</html>
