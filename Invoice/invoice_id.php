<?php
require_once('config.php');

$clientId = mysqli_real_escape_string($conn, $_POST['c_name']);

    $query = mysqli_query($conn, "SELECT c_inno FROM client WHERE c_name = '$clientId' LIMIT 1");

    if ($query) {
        $result = mysqli_fetch_assoc($query);
        $invoiceId = $result['c_inno'];
        echo json_encode(['invoiceId' => $invoiceId]);
    } else {
        echo json_encode(['error' => 'Unable to fetch invoice ID']);
    }
?>