<?php
require_once('config.php');

$clientId = mysqli_real_escape_string($conn, $_POST['clientId']);

    $query = mysqli_query($conn, "SELECT cilent_invoice_no FROM cilents WHERE cilent_name = '$clientId' LIMIT 1");

    if ($query) {
        $result = mysqli_fetch_assoc($query);
        $invoiceId = $result['cilent_invoice_no'];
        echo json_encode(['invoiceId' => $invoiceId]);
    } else {
        echo json_encode(['error' => 'Unable to fetch invoice ID']);
    }
?>