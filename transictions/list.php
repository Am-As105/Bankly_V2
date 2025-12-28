<?php
include __DIR__ . "/../connection_db.php";



$sql = "SELECT t.id, t.account_id, t.type, t.amount, t.created_at
        FROM transactions t
        ORDER BY t.created_at DESC";
$stmt = $connect_db->query($sql);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Transactions</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>

 <div class="header">

         <h4> Dashboard</h5>
          <ul>
            <li> <a href="../cliens/add_client.php">client</a></li>
            <li> <a href="../account/add_account.php">acounts</a></li>
            <li> <a href="">transactions</a></li>
          </ul>
          <button >Log out</button>
    </div>

<br> <br><br>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Account</th>
    <th>Type</th>
    <th>Amount</th>
    <th>Date</th>
</tr>

<?php foreach ($transactions as $t) { ?>
<tr>
    <td><?= $t['id'] ?></td>
    <td><?= $t['account_id'] ?></td>
    <td><?= $t['type'] ?></td>
    <td><?= $t['amount'] ?></td>
    <td><?= $t['created_at'] ?></td>
</tr>
<?php }  ?>

</table>

</body>
</html>
