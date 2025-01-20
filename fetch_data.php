<?php
require_once('config.php');
if(isset($_GET['work']) && $_GET['work'] == 1){
    if (isset($_GET['invoiceId'])) {

        $invoiceId = mysqli_real_escape_string($conn, $_GET['invoiceId']);
        $query = mysqli_query($conn, "SELECT * FROM invoice_bills WHERE bill_id = '$invoiceId'");
        
        if ($row = mysqli_fetch_assoc($query)) {
            echo json_encode($row);
        } else {
            echo json_encode(['error' => 'Course not found']);
        }
    } else {
       
        $fetch_invoice_data = mysqli_query($conn, "SELECT * FROM invoice_bills WHERE status = '1' ORDER BY modify_date_time DESC");
    
        $invoice_data = array();
        while ($invoice_row = mysqli_fetch_assoc($fetch_invoice_data)) {
            $invoice_data[] = $invoice_row;
        }
    
        echo json_encode($invoice_data);
    }
}
?>