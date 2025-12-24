<?php
include "../connection_db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['client_id']) && !empty($_POST['balance']) && !empty($_POST['type']) && !empty($_POST['status'])) {

        $client_id = $_POST['client_id'];
        $balance   = $_POST['balance'];
        $type      = $_POST['type'];
        $status    = $_POST['status'];

        $stmt = $connect_db->prepare(
            "INSERT INTO accounts (client_id, balance, type, status) VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$client_id, $balance, $type, $status]);

        echo "<p>Account added successfully!</p>";
        sleep(3);
        header("location:http://localhost/Bankly_V2/cliens/list_clients.php?delete=21");
    } else {
        echo "<p>Please fill all fields!</p>";
    }
}

$clients = $connect_db->query("SELECT client_id, full_name FROM client");
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style.css">

    
    
   
</head>
<body>

    <div class="header">

         <h4> Dashboard</h5>
          <ul>
            <li> <a href="cliens/list_clients.php">client</a></li>
            <li> <a href="account/add_account.php">acounts</a></li>
            <li> <a href="transictions/list.php">transactions</a></li>
          </ul>
          <button >Log out</button>
    </div>

      
<form method="POST">
    <label>Client:</label><br>
    <select name="client_id" required>
        <option value="">Select Client</option>
        <?php while ($row = $clients->fetch()) { ?>
            <option value="<?= $row['client_id'] ?>"><?= $row['full_name'] ?></option>
        <?php } ?>
    </select><br><br>

    <label>Balance:</label><br>
    <input type="number" step="0.01" name="balance" placeholder="Balance" required><br><br>

    <label>Type:</label><br>
    <input type="text" name="type" placeholder="Type" required><br><br>

    <label>Status:</label><br>
    <input type="text" name="status" placeholder="Status" required><br><br>

    <button type="submit">Add Account</button>
</form>


</body>
</html>
