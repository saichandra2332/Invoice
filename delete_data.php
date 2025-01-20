<?php
require_once('config.php');

    if (isset($_GET['invoiceId'])) {
        $invoiceId = $_GET['invoiceId'];
        
        $delete_data = mysqli_query($conn, "UPDATE invoice_bills SET status ='0' WHERE bill_id = '$invoiceId'");

        if ($delete_data) {
            echo json_encode(['success' => true, 'message' => 'Record deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error deleting record: ' . mysqli_error($conn)]);
        }
    
    }
?>