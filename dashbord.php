

<?php

    include "connection_db.php";

  $num_client = $connect_db->query("SELECT COUNT(*) FROM users");
  $num_account = $connect_db->query("SELECT  COUNT(*) FROM accounts ");
  $num_transactions = $connect_db->query( " SELECT COUNT(*) from transactions" );
  $total_users = $num_client->fetchColumn();

  $total_accounts = $num_account->fetchColumn();
  $total_tr = $num_transactions->fetchColumn();

       

  
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">

    
    
   
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

    <div class="container">
        <div class="card">
            <h3>Nombre de clients</h3>
            <p>  <?php echo $total_users?> </p>
        </div>

        <div class="card">
            <h3>Nombre de comptes</h3>
            <p><?php echo $total_accounts?> </p>
        </div>

        <div class="card">
            <h3>Transactions </h3>
            <p><?php echo $total_tr?> </p>
        </div>
    </div>

</body>
</html>
