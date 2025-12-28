<?php
include "connection_db.php";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $connect_db->prepare("DELETE FROM client WHERE client_id = ?");
    $stmt->execute([$id]);
    
}

$stmt = $connect_db->query("SELECT * FROM client");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Clients</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "add_client.php"; ?>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Full name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Action</th>
    </tr>

    <?php foreach ($clients as $client) { ?>
    <tr>
        <td><?= $client['client_id'] ?></td>
        <td><?= $client['full_name'] ?></td>
        <td><?= $client['email'] ?></td>
        <td><?= $client['phone'] ?></td>
        <td><?= $client['registration_date'] ?></td>
       <td>
    <a href="edit_client.php?id=<?= $client['client_id'] ?>">Edit</a>
    |
    <a href="?delete=<?= $client['client_id'] ?>" onclick="return confirm('Delete ?')">Delete</a>
   </td>

    </tr>
    <?php } ?>
</table>

</body>
</html>
