<?php
require_once('config.php');

if (isset($_POST['work']) && $_POST['work'] == 1) {
    
    $response = 0;

    $invoiceId = mysqli_real_escape_string($conn, $_POST['invoiceId']);
    $clientName = mysqli_real_escape_string($conn, $_POST['clientName']);
    $invoiceNumber = mysqli_real_escape_string($conn, $_POST['invoiceNumber']);
    $invoiceDate = mysqli_real_escape_string($conn, $_POST['invoiceDate']);
    $dueDate = mysqli_real_escape_string($conn, $_POST['dueDate']);
    $invoiceType = mysqli_real_escape_string($conn, $_POST['invoiceType']);
    $projectName = mysqli_real_escape_string($conn, $_POST['projectName']);
    $itemName = mysqli_real_escape_string($conn, $_POST['itemName']);
    $totalAmount = mysqli_real_escape_string($conn, $_POST['totalAmount']);
    $billingAddress = mysqli_real_escape_string($conn, $_POST['billingAddress']);
    $cilentAddress = mysqli_real_escape_string($conn, $_POST['cilentAddress']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    $gst = 0;
    $grand_total = 0;
    
    $gst = (18/100) * $totalAmount;

    $grand_total = $gst + $totalAmount;

    function isHoliday($date) {
        $holidays = array('2024-01-01', '2024-01-07','2024-01-14','2024-01-21','2024-01-28','2024-01-15','2024-01-17','2024-01-26','2024-02-04','2024-02-10');
        return in_array($date, $holidays);
    }
    $todayDate = date('Y-m-d');

    if ($invoiceId != '') {
        if (
            $clientName != '' && $invoiceNumber != '' &&
            $invoiceDate != '' && $dueDate != '' &&
            $invoiceType != '' && $projectName != '' &&
            $itemName != '' && $totalAmount != '' &&
            $billingAddress != '' && $cilentAddress != ''
        ) {
            
            if ($invoiceDate !== $todayDate) {
                $response = 5; 
            } elseif (isHoliday($invoiceDate)) {
                $response = 6; 
            } elseif (strtotime($dueDate) <= strtotime($invoiceDate)) {
                $response = 7; 
            } elseif (strtotime($dueDate) > strtotime("+30 days", strtotime($invoiceDate))) {
                $response = 8; 
            } elseif (strtotime($dueDate) < strtotime("+13 days", strtotime($invoiceDate))) {
                $response = 9;
            } 
            else {
                
                $query = mysqli_query($conn, "UPDATE invoice_bills SET client_name = '$clientName', invoice_no = '$invoiceNumber', date = '$invoiceDate', due_date = '$dueDate', invoice_type = '$invoiceType', project_name = '$projectName', item = '$itemName', amount = '$totalAmount', from_address = '$billingAddress', to_address = '$cilentAddress',add_note = '$note',gst = '$gst',grand_total = '$grand_total',modify_date_time = CURRENT_TIMESTAMP WHERE bill_id = '$invoiceId'");
                $response = 1;
            }
        } else {
            $response = 2; 
        }
    } else {
        if (
            $clientName != '' && $invoiceNumber != '' &&
            $invoiceDate != '' && $dueDate != '' &&
            $invoiceType != '' && $projectName != '' &&
            $itemName != '' && $totalAmount != '' &&
            $billingAddress != '' && $cilentAddress != ''
        ) {
          
            if ($invoiceDate !== $todayDate) {
                $response = 5; 
            } elseif (isHoliday($invoiceDate)) {
                $response = 6;
            } elseif (strtotime($dueDate) <= strtotime($invoiceDate)) {
                $response = 7; 
            } elseif (strtotime($dueDate) > strtotime("+30 days", strtotime($invoiceDate))) {
                $response = 8; 
            } elseif (strtotime($dueDate) < strtotime("+13 days", strtotime($invoiceDate))) {
                $response = 9;
            } else {
                
                $query = mysqli_query($conn, "INSERT INTO invoice_bills (client_name, invoice_no, date, due_date, invoice_type, project_name, item, amount, from_address, to_address, add_note,gst,grand_total) VALUES ('$clientName', '$invoiceNumber', '$invoiceDate', '$dueDate', '$invoiceType', '$projectName', '$itemName', '$totalAmount', '$billingAddress', '$cilentAddress', '$note','$gst','$grand_total')");
                $response = 3;
            }
        } else {
            $response = 4; 
        }
    }

    echo json_encode($response);
}
?>