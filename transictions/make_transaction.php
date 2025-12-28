<?php
include __DIR__ . "/../connection_db.php";

$accounts = $connect_db->query("SELECT id FROM accounts")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account_id = $_POST['account_id'];
    $type       = $_POST['type'];
    $amount     = $_POST['amount'];

    $stmt = $connect_db->prepare(
        "INSERT INTO transactions (account_id, type, amount)
         VALUES (?, ?, ?)"
    );
    $stmt->execute([$account_id, $type, $amount]);
}
?>

<form method="POST">
    <select name="account_id" required>
        <option value="">Select Account</option>
        <?php foreach ($accounts as $acc): ?>
            <option value="<?= $acc['id'] ?>">
                Account #<?= $acc['id'] ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <select name="type" required>
        <option value="">Transaction Type</option>
        <option value="deposit">Deposit</option>
        <option value="withdraw">Withdraw</option>
    </select><br><br>

    <input type="number" step="0.01" name="amount" placeholder="Amount" required><br><br>

    <button type="submit">Save Transaction</button>
</form>
