<?php
include "connection_db.php";

if (!isset($_GET['id'])) {
    header("Location: list_accounts.php");
    exit;
}

$id = $_GET['id'];

$stmt = $connect_db->prepare("SELECT * FROM accounts WHERE account_id = ?");
$stmt->execute([$id]);
$account = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$account) 
    {
    echo "Account not found";
    exit;
}

if (isset($_POST['save'])) {
    $account_name = $_POST['account_name'];
    $balance = $_POST['balance'];
    $created_date = $_POST['created_date'];

    $update = $connect_db->prepare("
        UPDATE accounts
        SET account_name = ?, balance = ?, created_date = ?
        WHERE account_id = ?
    ");
    $update->execute([$account_name, $balance, $created_date, $id]);

    header("Location: list_accounts.php");
    exit;
}
?>

<form method="POST">

    <label>Account Name</label><br>
    <input type="text" name="account_name" value="<?= $account['account_name'] ?>" required>
    <br><br>

    <label>Balance</label><br>
    <input type="number" name="balance" value="<?= $account['balance'] ?>" required>
    <br><br>

    <label>Created Date</label><br>
    <input type="date" name="created_date" value="<?= $account['created_date'] ?>" required><br><br>

    <button type="submit" name="save">Update Account</button>
</form>
