<?php
include "connection_db.php";

if (!isset($_GET['id'])) {
    header("Location: client.php");
    exit;
}

$id = $_GET['id'];


$stmt = $connect_db->prepare("SELECT * FROM client WHERE client_id = ?");
$stmt->execute([$id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$client) {
    echo "Client not found";
    exit;
}


if (isset($_POST['save'])) {
    $full_name = $_POST['full_name'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $date_R    = $_POST['registration_date'];

    $update = $connect_db->prepare("
        UPDATE client 
        SET full_name = ?, email = ?, phone = ?, registration_date = ? 
        WHERE client_id = ?
    ");
    $update->execute([$full_name, $email, $phone, $date_R, $id]);

    
   
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edit Client</title>
</head>
<body>

<h2>Edit Client</h2>

<form method="POST">
    <label>Full Name</label><br>
    <input type="text" name="full_name" value="<?= $client['full_name'] ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?= $client['email'] ?>" required><br><br>

    <label>Phone</label><br>
    <input type="text" name="phone" value="<?= $client['phone'] ?>"><br><br>

    <label>Registration Date</label><br>
    <input type="date" name="registration_date" value="<?= $client['registration_date'] ?>" required><br><br>

    <button type="submit" name="save">Update</button>
</form>

</body>
</html>
