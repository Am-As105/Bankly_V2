<?php


 include __DIR__ . "/../connection_db.php";

if (isset($_POST['save'])){

    $full_name = $_POST['full_name'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $date_R    = $_POST['registration_date'];

    $insert_to_db = $connect_db->prepare(
        "INSERT INTO client (full_name, email, phone, registration_date) VALUES (?, ?, ?, ?)"
    );

    $insert_to_db->execute([

        $full_name,
        $email,
        $phone,
        $date_R
    ] );
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">;
</head>
<body>

<div class="header">

         <h4> Dashboard</h5>
          <ul>
            <li> <a href="add_cliens.php">client</a></li>
            <li> <a href="../account/add_account.php">acounts</a></li>
            <li> <a href="">transactions</a></li>
          </ul>
          <button >Log out</button>
    </div>

    <br>
    <br>
    
 <form method="POST">

    <label>Full Name</label><br>
    <input type="text" name="full_name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone</label><br>
    <input type="text" name="phone"><br><br>

    <label>Registration Date</label><br>
    <input type="date" name="registration_date" required><br><br>

    <button type="submit" name="save">Save</button>

</form>


    
    
</body>
</html>