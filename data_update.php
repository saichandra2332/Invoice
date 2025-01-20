<?php
require_once('config.php');

    $bill_id = mysqli_real_escape_string($conn, $_POST['bill_id']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);
    $unitPrice = mysqli_real_escape_string($conn, $_POST['unitPrice']);
    $gst = mysqli_real_escape_string($conn, $_POST['gst']);
    $grandTotal = mysqli_real_escape_string($conn, $_POST['grandTotal']);
    
    $update_query = mysqli_query($conn, "UPDATE invoice_bills SET quantity = '$unit', amount = '$unitPrice', gst = '$gst', grand_total = '$grandTotal' WHERE bill_id = '$bill_id'");
?>