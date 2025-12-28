<?php
include "connection_db.php";

if (isset($_GET['delete'])) {
    include "delete_client.php";
}
if (isset($_GET['edit'])) {
    include "edit_client.php";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="style.css">
</head>
<body>




<?php include "list_clients.php"; ?>

</body>
</html>
