<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" href="style.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

     
       

    <div>  
        <h2> Welcome to Register Page </h3>  
        </div>
    <div class="form">

        

         <div class="form-1">
            <div class="d1"></div>

            <marquee behavior="" direction="">0</marquee>
            <marquee behavior="" direction="right">1</marquee>
            <marquee behavior="" direction="">0</marquee>
            <marquee behavior="" direction="right"> 1</marquee>
             <marquee behavior="" direction="">1</marquee>
              <marquee behavior="" direction="right">0</marquee>
                <marquee behavior="" direction="">0</marquee>
            <marquee behavior="" direction="right">1</marquee>
            <marquee behavior="" direction="">0</marquee>
            <marquee behavior="" direction="right"> 1</marquee>
             <marquee behavior="" direction="">1</marquee>
              <marquee behavior="" direction="right">0</marquee>
               <div class="d2"></div>
         </div>

       
         <form   class="form-2"  method="POST">

            <h3>Registration</h3>


            <div>
                <label for="username">username</label>  
            </div>
            <div>
                <input  name="user" type="text">
                
            </div>
           
            <div>
                <label for="password">password</label>  
            </div>
            <div>
                <input type="password"  name="pass">
                
            </div>
             
            <button  name="register">Register</button>
             <p>already register  <a href="login.php">Loign</a></p>
       </form>
    </div>

    <footer class="footer">
        
        by Amine elarar  devFL 2030 
    </footer>


   
    
</body>
</html>

 <?php 


  $user = "root";
  $pass = "";

try {
    $connect_db = new PDO("mysql:host=localhost;dbname=bankly_V2", $user,$pass);
    $connect_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["user"], $_POST["pass"])){

        $username = $_POST["user"];
        $password = $_POST["pass"];

        $stm = $connect_db->prepare(
            "INSERT INTO user (user_name, password, role) VALUES (?, ?, 'admin')"
        );

        $stm->execute([$username, $password]);
        sleep(5);

        echo "User created successfully";
        header("Location: login.php");
    }

} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}




      
    
    ?>